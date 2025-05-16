<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('agents.index');
    }

    public function settings($id = null)
    {
        $agent = Agent::where('uuid', $id)
            ->first();

        return view('agents.settings', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = null) {
        $request->validate([
            'address' => 'required|string',
            'name' => 'required|string',
            'bio' => 'array',
            'bio.*' => 'string',
            'lore' => 'array',
            'lore.*' => 'string',
            'topics' => 'array',
            'topics.*' => 'string',
            'adjectives' => 'array',
            'adjectives.*' => 'string',
            'style_all' => 'array',
            'style_all.*' => 'string',
            'style_chat' => 'array',
            'style_chat.*' => 'string',
            'style_post' => 'array',
            'style_post.*' => 'string',
            'twitter_email' => 'nullable|string',
            'twitter_username' => 'nullable|string',
            'twitter_password' => 'nullable|string',
            'twitter_2fa' => 'nullable|string',
            'telegram_bot_token' => 'nullable|string',
            'telegram_chat_id' => 'nullable|string',
        ]);

        $agentWithSameNameExists = Agent::where('name', 'LIKE', $request->name)
            ->where(function ($query) use ($id) {
                if($id) {
                    $query->where('uuid', '!=', $id);
                }
            })
            ->first();

        abort_if($agentWithSameNameExists, 422, "Agent with same name already exists.");

        if($id) {
            $agent = Agent::where('uuid', $id)
                ->first();

            abort_if(!$agent, 422, "Agent not found.");
        } else {
            $agent = new Agent();
            $agent->uuid = (string) Str::uuid();
            $agent->address = $request->address;
        }

        $agent->name = $request->name;
        $agent->bio = $request->bio ? json_encode($request->bio) : '[]';
        $agent->lore = $request->lore ? json_encode($request->lore) : '[]';
        $agent->topics = $request->topics ? json_encode($request->topics) : '[]';
        $agent->adjectives = $request->adjectives ? json_encode($request->adjectives) : '[]';
        $agent->style_all = $request->style_all ? json_encode($request->style_all) : '[]';
        $agent->style_chat = $request->style_chat ? json_encode($request->style_chat) : '[]';
        $agent->style_post = $request->style_post ? json_encode($request->style_post) : '[]';
        $agent->twitter_email = $request->twitter_email ?? null;
        $agent->twitter_username = $request->twitter_username ?? null;
        $agent->twitter_password = $request->twitter_password ?? null;
        $agent->twitter_2fa = $request->twitter_2fa ?? null;
        $agent->telegram_bot_token = $request->telegram_bot_token ?? null;
        $agent->telegram_chat_id = $request->telegram_chat_id ?? null;

        if($id) {
            $agent->update();
        } else {
            $agent->save();
        }

        return response()->json([
            'redirect' => !$id ? route('agents.settings', $agent['uuid']) : null
        ]);
    }

    public function toggle(Request $request, string $id, string $client) {
        abort_if(!in_array($client, ['twitter', 'telegram']), 422, "Invalid client. Only Twitter/X and Telegram are supported.");

        $agent = Agent::where('uuid', $id)
            ->first();

        abort_if(!$agent, 422, "Agent not found.");

        $agentId = ($client == 'twitter') ? $agent["twitter_agent_id"] : $agent["telegram_agent_id"];

        // Turn Off Agent
        if($agentId) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('http://' . config('app.elizaos_server_url') . '/agents/' . $agentId . '/stop');

            abort_if(!$response->successful(), 422, "An error occurred while disabling the agent.");

            if($client == "twitter") {
                $agent['twitter_agent_id'] = null;
            } else if($client == "telegram") {
                $agent['telegram_agent_id'] = null;
            }

            $agent->update();
        }

        // Turn On Agent
        if(!$agentId) {
            if($client == "twitter") {
                if(!$agent['twitter_email'] || !$agent['twitter_username'] || !$agent['twitter_password']) {
                    abort(422, "Incomplete Twitter / X credentials");
                }
            } else if($client == "telegram") {
                if(!$agent['telegram_bot_token'] || !$agent['telegram_chat_id']) {
                    abort(422, "Incomplete Telegram credentials");
                }
            }

            $data = [
                'name' => $agent['name'] . ' (' . ucfirst($client) . ')',
                'clients' => [$client],
                'modelProvider' => 'grok',
                'settings' => [
                    'secrets' => $client == "twitter" ? [
                        'TWITTER_USERNAME' => $agent['twitter_username'],
                        'TWITTER_PASSWORD' => $agent['twitter_password'],
                        'TWITTER_EMAIL' => $agent['twitter_email'],
                        'TWITTER_2FA_SECRET' => $agent['twitter_2fa'] ?? '',
                        'TWITTER_TARGET_USERS' => '',
                    ] : [
                        'TELEGRAM_BOT_TOKEN' => $agent['telegram_bot_token']
                    ],
                    'voice' => [
                        'model' => 'en_US-male-medium'
                    ]
                ],
                'plugins' => $client == "twitter" ? [
                    '@elizaos/client-twitter'
                ] : [
                    '@elizaos/client-telegram'
                ],
                'bio' => $agent->parsedBio(),
                'lore' => $agent->parsedLore(),
                'adjectives' => $agent->parsedAdjectives(),
                'messageExamples' => [],
                'postExamples' => [],
                'topics' => $agent->parsedTopics(),
                'style' => [
                    'all' => $agent->parsedStyleAll(),
                    'chat' => $agent->parsedStyleChat(),
                    'post' => $agent->parsedStylePost()
                ],
            ];

            if($client == "telegram") {
                $data['allowDirectMessages'] = true;
                $data['shouldOnlyJoinInAllowedGroups'] = true;
                $data['allowedGroupIds'] = [
                    $agent['telegram_chat_id']
                ];
                $data['messageTrackingLimit'] = 10000;
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post('http://' . config('app.elizaos_server_url') . '/agents/1/set', $data);

            if($response->successful()) {
                if($client == "twitter") {
                    $agent['twitter_agent_id'] = $response->json('id');
                } else if($client == "telegram") {
                    $agent['telegram_agent_id'] = $response->json('id');
                }

                $agent->update();
            } else {
                abort(422, "An error occurred while enabling the agent. " . $response->body());
            }
        }

        return response()->json();
    }
}
