@extends('layouts.app')

@section('title', 'Log In')

@section('content')
    <div class="background-image-cover" style="background-image:url('{{ asset('img/home/hero.webp') }}')">
        @include('home.includes.nav')

        <div class="position-relative background-image-cover" style="background-image:url('{{ asset('img/home/woman.webp') }}')">
            <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

            <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
                <div class="d-flex justify-content-center align-items-center min-vh-100 tw-pt-[44px]">
                    <div class="w-100 py-5">
                        <h1 class="text-white helvetica-neue-light text-center line-height-140 line-height-sm-130 font-size-170 font-size-sm-170 font-size-md-190 font-size-lg-220 font-size-xl-240 font-size-xxl-260 pt-5 mb-5">Log in for a seamless shopping experience.<br> Don't miss out!</h1>

                        <div class="row justify-content-center">
                            <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                                <form id="user-login-form" class="mb-4">
                                    <input type="hidden" name="url" value="{{ route('login.submit') }}" />

                                    <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                                    <div class="position-relative">
                                        <input type="password" name="password" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your password" required />

                                        <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                            <i class="fa-solid fa-eye font-size-110"></i>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">Log In</button>
                                    </div>
                                </form>

                                <div class="text-center mb-4">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-forgot-password" class="text-decoration-none">
                                        <div class="helvetica-neue-light text-white font-size-100 font-size-sm-110 font-size-md-120 font-size-lg-130 font-size-xl-130 ps-3">Forgot Password?</div>
                                    </a>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('register.index') }}" class="text-decoration-none">
                                        <div class="helvetica-neue-light text-white font-size-100 font-size-sm-110 font-size-md-120 font-size-lg-130 font-size-xl-130 ps-3">Don't have an account yet? <span class="helvetica-neue-light text-decoration-underline">Create one!</span></div>
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

@endsection
