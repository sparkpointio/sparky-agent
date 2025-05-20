@extends('layouts.app')

@section('title', 'Agents')

@section('content')
<main class="main">
    <form id="agent-form">
        <input type="hidden" name="url" value="{{ route('agents.update', $agent ? $agent['uuid'] : '') }}" />

        <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px] align-items-center">
            <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3">
                <li class="breadcrumb-item active" aria-current="page">
                    <h1 class="h-custom-4 mb-2">Agent Settings</h1>
                    <p class="mb-0 text-gray-800">Configure your AI agent's behavior and capabilities</p>
                </li>
            </ol>

            <div class="px-3">
                <button type="submit" class="btn btn-custom-2 tw-rounded-[25px] px-5">Save Changes</button>
            </div>
        </div>

        <div class="animated fadeIn pb-5" id="agent-settings">
            <ul class="nav nav-pills nav-fill mt-4 mb-4 pb-2">
                <li class="nav-item">
                    <button class="nav-link font-weight-700 !tw-rounded-[20px] py-2 active" aria-current="page" data-bs-toggle="tab" data-bs-target="#content-tab-pane" type="button" role="tab" aria-controls="content-tab-pane" aria-selected="true">Content</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link font-weight-700 !tw-rounded-[20px] py-2" data-bs-toggle="tab" data-bs-target="#style-tab-pane" type="button" role="tab" aria-controls="style-tab-pane" aria-selected="true">Style</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link font-weight-700 !tw-rounded-[20px] py-2" data-bs-toggle="tab" data-bs-target="#secret-tab-pane" type="button" role="tab" aria-controls="secret-tab-pane" aria-selected="true">Secret</button>
                </li>
            </ul>

            <div class="tab-content pb-5" id="myTabContent">
                <div class="tab-pane fade show active" id="content-tab-pane" role="tabpanel" aria-labelledby="content-tab" tabindex="0">
                    <div class="mb-4 pb-2">
                        <label for="name" class="form-label mb-0">Name *</label>
                        <p class="text-secondary">The primary identifier for this agent</p>
                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="name" name="name" placeholder="Name" value="{{ $agent['name'] ?? '' }}" required />
                    </div>

                    <div class="agent-input mb-4 pb-2" data-input="bio">
                        <label for="name" class="form-label mb-0">Bio</label>
                        <p class="text-secondary">Bio data for this agent</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedBio()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedBio() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>

                    <div class="agent-input mb-4 pb-2" data-input="lore">
                        <label for="name" class="form-label mb-0">Lore</label>
                        <p class="text-secondary">Agent's backstory or fictional context.</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedLore()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedLore() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>

                    <div class="agent-input mb-4 pb-2" data-input="topics">
                        <label for="name" class="form-label mb-0">Topics</label>
                        <p class="text-secondary">Topics this agent can talk about</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedTopics()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedTopics() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>

                    <div class="agent-input mb-4 pb-2" data-input="adjectives">
                        <label for="name" class="form-label mb-0">Adjectives</label>
                        <p class="text-secondary">Descriptive personality traits</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedAdjectives()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedAdjectives() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>
                </div>

                <div class="tab-pane fade" id="style-tab-pane" role="tabpanel" aria-labelledby="style-tab" tabindex="0">
                    <div class="agent-input mb-4 pb-2" data-input="style_all">
                        <label for="name" class="form-label mb-0">All Styles</label>
                        <p class="text-secondary">Writing style for all content types</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedStyleAll()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedStyleAll() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>

                    <div class="agent-input mb-4 pb-2" data-input="style_chat">
                        <label for="name" class="form-label mb-0">Chat Style</label>
                        <p class="text-secondary">Style specific to chat interactions</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedStyleChat()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedStyleChat() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>

                    <div class="agent-input mb-4 pb-2" data-input="style_post">
                        <label for="name" class="form-label mb-0">Post Style</label>
                        <p class="text-secondary">Style for long-form content</p>

                        <div class="flex-wrap tw-mx-[-4px] mb-3 values {{ $agent && count($agent->parsedStylePost()) > 0 ? 'd-flex' : 'd-none' }}">
                            @if($agent)
                                @foreach($agent->parsedStylePost() as $value)
                                <div class="tw-bg-[#eeeeee] tw-w-[initial] d-flex tw-rounded-[20px] tw-border-solid tw-border-[1px] tw-border-[#222222] px-3 py-0 mx-1 mb-2 value">
                                    <div>
                                        <p class="mb-0">{{ $value }}</p>
                                    </div>
                                    <div class="ps-3 mb-0">
                                        <i class="fa-solid fa-times cursor-pointer remove"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                    </div>
                </div>

                <div class="tab-pane fade" id="secret-tab-pane" role="tabpanel" aria-labelledby="secret-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card rounded-0 tw-border-[#cccccc]">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="">
                                            <p class="font-weight-700 font-size-110 mb-0">X / Twitter Settings</p>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn btn-custom-2-outline tw-rounded-[25px] font-size-80 px-4 py-1">Instructions</button>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="twitter_email" class="form-label mb-2">Email</label>
                                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="twitter_email" name="twitter_email" placeholder="Email" value="{{ $agent['twitter_email'] ?? '' }}" />
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="twitter_username" class="form-label mb-2">Username</label>
                                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="twitter_username" name="twitter_username" placeholder="Username" value="{{ $agent['twitter_username'] ?? '' }}" />
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="twitter_password" class="form-label mb-2">Password</label>
                                        <input type="password" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="twitter_password" name="twitter_password" placeholder="Password" value="{{ $agent['twitter_password'] ?? '' }}" />
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="twitter_2fa" class="form-label mb-2">2FA <span class="fst-italic font-size-90">(Required if enabled)</span></label>
                                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="twitter_2fa" name="twitter_2fa" placeholder="2FA" value="{{ $agent['twitter_2fa'] ?? '' }}" />
                                    </div>

                                    @if($agent)
                                    <div class="">
                                        <button type="button" class="btn {{ $agent['twitter_agent_id'] ? 'btn-custom-4' : 'btn-custom-2' }} tw-rounded-[25px] px-5 py-2 toggle-agent" data-url="{{ route('agents.toggle', [$agent['uuid'], 'twitter']) }}">{{ $agent['twitter_agent_id'] ? 'Stop' : 'Start' }} Agent</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card rounded-0 tw-border-[#cccccc]">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="">
                                            <p class="font-weight-700 font-size-110 mb-0">Telegram Settings</p>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn btn-custom-2-outline tw-rounded-[25px] font-size-80 px-4 py-1">Instructions</button>
                                        </div>
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="telegram_bot_token" class="form-label mb-2">Bot Token</label>
                                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="telegram_bot_token" name="telegram_bot_token" placeholder="Bot Token" value="{{ $agent['telegram_bot_token'] ?? '' }}" />
                                    </div>

                                    <div class="mb-4 pb-2">
                                        <label for="telegram_chat_id" class="form-label mb-2">Chat ID</label>
                                        <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="telegram_chat_id" name="telegram_chat_id" placeholder="Chat ID" value="{{ $agent['telegram_chat_id'] ?? '' }}" />
                                    </div>

                                    @if($agent)
                                    <div class="">
                                        <button type="button" class="btn {{ $agent['telegram_agent_id'] ? 'btn-custom-4' : 'btn-custom-2' }} tw-rounded-[25px] px-5 py-2 toggle-agent" data-url="{{ route('agents.toggle', [$agent['uuid'], 'telegram']) }}">{{ $agent['telegram_agent_id'] ? 'Stop' : 'Start' }} Agent</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<div class="modal fade" id="modal-agent-payment" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content tw-rounded-[0]">
            <div class="modal-body px-4 px-sm-5 py-4">
                <div class="text-center mt-3 mb-2">
                    <img src="{{ asset('img/home/img-4.webp') }}" class="tw-w-[120px]" />
                </div>

                <div class="text-center h-custom-4 font-weight-500 mb-3 title">Payment Required</div>

                <div class="text-center font-size-120 mb-3">Starting an agent requires a one-time payment of <strong>{{ number_format(config('app.payment_price')) }} SRK</strong>.</div>
                <div class="text-center mb-3">To start the agent, please complete your payment first.</div>
                <div class="text-center mb-0">Access to this feature is available only to paid users. Once your payment is confirmed, you’ll be able to start and manage your agent.</div>
            </div>
            <div class="modal-footer justify-content-center py-4" style="border-color:#808080">
                <button type="button" class="btn btn-custom-2 py-2 tw-rounded-[25px] px-5" id="make-payment">Make a Payment</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-srk-approval" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content tw-rounded-[0]">
            <div class="modal-body px-4 px-sm-5 py-5">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/home/img-4.webp') }}" class="tw-w-[140px] pulse" />
                </div>

                <div class="text-center h-custom-4 font-weight-500 mb-3 title">Approving SRK Token</div>
                <div class="text-center mb-3">Please confirm the token approval in your wallet.</div>
                <div class="text-center mb-3">This allows the payment contract to spend <strong>{{ number_format(config('app.payment_price')) }} SRK</strong> on your behalf.</div>
                <div class="text-center font-size-90 fst-italic mb-0">This is a one-time approval. You’ll only need to do this once.</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-srk-payment" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content tw-rounded-[0]">
            <div class="modal-body px-4 px-sm-5 py-5">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/home/img-4.webp') }}" class="tw-w-[140px] pulse" />
                </div>

                <div class="text-center h-custom-4 font-weight-500 mb-3 title">Confirm SRK Payment</div>
                <div class="text-center mb-3">Now, please confirm the <strong>{{ number_format(config('app.payment_price')) }} SRK</strong> payment in your wallet.</div>
                <div class="text-center mb-3">This will grant you access to the premium agent features.</div>

                <div class="text-center font-size-90 fst-italic mb-0">Almost there! This payment is final and will be processed securely.</div>
            </div>
        </div>
    </div>
</div>
@endsection
