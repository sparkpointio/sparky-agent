@extends('layouts.app')

@section('title', 'Agents')

@section('content')
<main class="main">
    <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px]">
        <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3">
            <li class="breadcrumb-item active" aria-current="page">
                <h1 class="h-custom-4 mb-0 text-gray-800">Agents</h1>
            </li>
        </ol>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="">
            <div class="px-2 px-sm-4 px-md-5 py-5 text-center" id="agents-loading">
                <img src="{{ asset('img/home/img-3.webp') }}" class="tw-w-[200px] mb-4 pulse" />
                <p class="h-custom-4 text-center">Loading</p>
            </div>

            <div class="px-2 px-sm-4 px-md-5 py-5 d-none no-agents-found-container">
                <p class="h-custom-2 text-center">You haven’t created any SparkAgents yet.</p>
                <p class="h-custom-5 text-center">Kickstart your AI journey by creating your first agent — it only takes a few minutes.</p>
                <p class="h-custom-5 text-center mb-5">Customize its personality, connect your socials, and let it work for you 24/7.</p>

                <div class="text-center">
                    <button class="btn btn-custom-2 px-4 px-sm-5 py-3 h-custom-5 tw-rounded-[50px] tw-w-[100%] sm:tw-w-[initial]" id="create-agent-redirect">Create Agent Now</button>
                </div>
            </div>

            <div class="pt-4 pb-5 row d-none" id="agents-list-container"></div>
        </div>
    </div>
</main>
@endsection
