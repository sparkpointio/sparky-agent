@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
    <div class="background-image-cover position-relative" style="background-image:url('{{ asset('img/home/bg.png') }}')">
        <div class="position-absolute tw-top-[0] tw-left-[0] tw-bg-[rgba(255,255,255,0.9)] tw-z-[1] w-100 h-100"></div>

        @include('home.includes.nav')

        <div class="position-relative">
            <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

            <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
                <div class="d-flex justify-content-center align-items-center min-vh-100 tw-pt-[74px]">
                    <div class="w-100 py-5">
                        <h1 class="text-center h-custom-2 mb-5">{{ __('Verify Your Email Address') }}</h1>
                        <p class="text-center h-custom-3 text-break mb-5">Before proceeding, please check your email ({{ Auth::user()->email }}) for a verification link.</p>
                        <p class="text-center h-custom-4 tw-mb-[74px]">{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}" class="text-black">{{ __('click here to request another') }}</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.includes.footer')

@endsection
