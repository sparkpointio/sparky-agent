@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="background-image-cover position-relative" style="background-image:url('{{ asset('img/home/bg.png') }}')">
    <div class="position-absolute tw-top-[0] tw-left-[0] tw-bg-[rgba(255,255,255,0.9)] tw-z-[1] w-100 h-100"></div>
    @include('home.includes.nav')

    <div class="position-relative background-image-cover" style="background-image:url('{{ asset('img/home/woman.webp') }}')">
        <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

        <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
            <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
                <div class="w-100 py-5">
                    <h1 class="text-center h-custom-2 pt-5 mb-5">We're Delighted to Have You!<br/> Register Here.</h1>

                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                            <form id="register-form" class="mb-4">
                                <input type="hidden" name="url" value="{{ route('register.submit') }}" />

                                <input type="text" name="name" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Your name" required />
                                <input type="email" name="email" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Your email address" required />

                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Your password" required />

                                    <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                        <i class="fa-solid fa-eye font-size-110"></i>
                                    </div>
                                </div>

                                <div class="position-relative">
                                    <input type="password" name="password_confirmation" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Confirm your password" required />

                                    <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                        <i class="fa-solid fa-eye font-size-110"></i>
                                    </div>
                                </div>

                                <div class="mb-5 pb-3">
                                    <button type="submit" class="btn btn-custom-1 w-100 py-2 tw-h-[45px]">Submit</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <a href="{{ route('login.index') }}" class="text-decoration-none text-black">
                                    <div class="h-custom-4 ps-3">Already have an account? <span class="text-decoration-underline">Log In!</span></div>
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
