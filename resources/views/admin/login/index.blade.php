@extends('layouts.app')

@section('title', 'Log In')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-sm-11 col-md-10 col-lg-7 col-xl-6 col-xxl-5 py-5">
            <div class="card border-radius-0 mb-4" style="border:1px solid #000000">
                <div class="card-body px-4 py-5 p-sm-5">
                    <p class="font-size-130 font-size-lg-140 text-center mb-2">Log In</p>
                    <form id="login-form" action="{{ route('admin.login.submit') }}">
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-1 px-5 py-2" name="email" type="text" placeholder="Email Address">
                            <div class="position-absolute" style="right:20px; top:9px">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-1 px-5 py-2" name="password" type="password" placeholder="Password">

                            <div class="position-absolute cursor-pointer tw-top-[10px] tw-right-[17px] toggle-password-show">
                                <i class="fa-solid fa-eye font-size-110"></i>
                            </div>
                        </div>

                        <div class="text-center mt-2 mb-4">
                            <button type="submit" class="btn btn-custom-1 px-5 w-100 py-2" id="login">Log In</button>
                        </div>

                        <div class="text-center">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-forgot-password" class="text-decoration-none link-color-1">
                                <div class="helvetica-neue-light ps-3">Forgot Password?</div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.includes.modalForgotPassword')

@endsection
