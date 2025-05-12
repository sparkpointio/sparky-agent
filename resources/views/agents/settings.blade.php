@extends('layouts.app')

@section('title', 'Agents')

@section('content')
<main class="main">
    <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px]">
        <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3">
            <li class="breadcrumb-item active" aria-current="page">
                <h1 class="h-custom-4 mb-2">Agent Settings</h1>
                <p class="mb-0 text-gray-800">Configure your AI agent's behavior and capabilities</p>
            </li>
        </ol>
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

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="content-tab-pane" role="tabpanel" aria-labelledby="content-tab" tabindex="0">
                <div class="mb-4 pb-2">
                    <label for="name" class="form-label mb-0">Name *</label>
                    <p class="text-secondary">The primary identifier for this agent</p>
                    <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" id="name" name="name" placeholder="Name" />
                </div>

                <div class="agent-input mb-4 pb-2" data-input="bio">
                    <label for="name" class="form-label mb-0">Bio</label>
                    <p class="text-secondary">Bio data for this agent</p>

                    <div class="flex-wrap tw-mx-[-4px] mb-3 values d-none"></div>

                    <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                </div>

                <div class="agent-input mb-4 pb-2" data-input="topics">
                    <label for="name" class="form-label mb-0">Topics</label>
                    <p class="text-secondary">Topics this agent can talk about</p>

                    <div class="flex-wrap tw-mx-[-4px] mb-3 values d-none"></div>

                    <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                </div>

                <div class="agent-input mb-4 pb-2" data-input="topics">
                    <label for="name" class="form-label mb-0">Adjectives</label>
                    <p class="text-secondary">Descriptive personality traits</p>

                    <div class="flex-wrap tw-mx-[-4px] mb-3 values d-none"></div>

                    <input type="text" class="form-control py-4 px-4 tw-border-solid tw-border-[1px] tw-border-[#222222] rounded-0" placeholder="Type and press Enter to add..." />
                </div>
            </div>

            <div class="tab-pane fade" id="style-tab-pane" role="tabpanel" aria-labelledby="style-tab" tabindex="0">

            </div>

            <div class="tab-pane fade" id="secret-tab-pane" role="tabpanel" aria-labelledby="secret-tab" tabindex="0">

            </div>
        </div>
    </div>
</main>
@endsection
