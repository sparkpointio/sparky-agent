@extends('layouts.app')

@section('title', 'Log In')

@section('content')
    <div class="background-image-cover position-relative" style="background-image:url('{{ asset('img/home/bg.png') }}')">
        <div class="position-absolute tw-top-[0] tw-left-[0] tw-bg-[rgba(255,255,255,0.9)] tw-z-[1] w-100 h-100"></div>

        @include('home.includes.nav')

        <div class="position-relative background-image-cover" style="background-image:url('{{ asset('img/home/woman.webp') }}')">
            <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

            <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
                <div class="d-flex justify-content-center align-items-center min-vh-100 tw-pt-[44px]">
                    <div class="w-100 py-5">
                        <h1 class="text-center h-custom-2 pt-5 mb-5">Ready to get started?<br/> Log in here.</h1>

                        <div class="row justify-content-center">
                            <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                                <form id="user-login-form" class="mb-4">
                                    <input type="hidden" name="url" value="{{ route('login.submit') }}" />

                                    <input type="email" name="email" class="form-control form-control-1 mb-3 py-2 px-3 text-center tw-h-[45px]" placeholder="Your email address" required />

                                    <div class="position-relative">
                                        <input type="password" name="password" class="form-control form-control-1 mb-3 py-2 px-3 text-center tw-h-[45px]" placeholder="Your password" required />

                                        <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                            <i class="fa-solid fa-eye font-size-110"></i>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <button type="submit" class="btn btn-custom-1 w-100 py-2 px-3 tw-h-[45px]">Log In</button>
                                    </div>
                                </form>

                                <div class="text-center mb-4">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-forgot-password" class="text-decoration-none text-black">
                                        <div class="h-custom-4 font-size-xl-130 ps-3">Forgot Password?</div>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('register.index') }}" class="text-decoration-none text-black">
                                        <div class="h-custom-4 ps-3">Don't have an account yet? <span class="helvetica-neue-light text-decoration-underline">Create one!</span></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.includes.footer')
    @include('login.includes.modalForgotPassword')

@endsection
