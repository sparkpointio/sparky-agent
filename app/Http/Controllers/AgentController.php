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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id = null)
    {
        $request->validate([
            'address' => 'required|string',
            'name' => 'required|string',
            'bio' => 'array',
            'bio.*' => 'string',
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

        if($id) {
            $agent = Agent::where('uuid', $id)
                ->first();
        } else {
            $agent = new Agent();
            $agent->uuid = (string) Str::uuid();
            $agent->address = $request->address;
        }

        $agent->name = $request->name;
        $agent->bio = $request->bio ? json_encode($request->bio) : '[]';
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
