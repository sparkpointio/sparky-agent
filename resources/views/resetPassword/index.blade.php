@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-sm-11 col-md-10 col-lg-7 col-xl-6 col-xxl-5 py-5">
            <div class="card border-radius-0 mb-4" style="border:1px solid #000000">
                <div class="card-body px-4 py-5 p-sm-5">
                    <p class="font-size-130 font-size-lg-140 text-center mb-2">Reset Password</p>
                    <p class="font-size-lg-110 text-center mb-4">Please enter your email address and new password below to reset your password.</p>

                    <form id="password-update-form">
                        <input type="hidden" name="url" value="{{ route('password.update') }}" />
                        <input type="hidden" name="token" value="{{ $token }}" />

                        <div class="position-relative">
                            <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                            <div class="position-absolute tw-top-[11px] tw-right-[15px]">
                                <i class="fas fa-envelope font-size-110"></i>
                            </div>
                        </div>

                        <div class="position-relative">
                            <input type="password" name="password" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your new password" required />

                            <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                <i class="fa-solid fa-eye font-size-110"></i>
                            </div>
                        </div>

                        <div class="position-relative">
                            <input type="password" name="password_confirmation" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Confirm your password" required />

                            <div class="position-absolute cursor-pointer tw-top-[11px] tw-right-[15px] toggle-password-show">
                                <i class="fa-solid fa-eye font-size-110"></i>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
