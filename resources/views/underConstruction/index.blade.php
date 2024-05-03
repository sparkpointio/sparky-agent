@extends('layouts.app')

@section('title', 'Under Construction')

@section('content')
<div class="background-image-cover position-relative tw-z-[0]" style="background-image:url('{{ asset('img/home/bg.png') }}')">
    <div class="position-absolute tw-top-[0] tw-left-[0] tw-bg-[rgba(255,255,255,0.9)] tw-z-[1] w-100 h-100"></div>

    <div class="container position-relative tw-z-[2]">
        <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
            <div class="w-100">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/home/logo.png') }}" width="110" alt="Kina Means Business" />
                </div>

                <h1 class="h-custom-1 text-center line-height-100 mb-5">Better things coming.</h1>

                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <form id="email-subscription-form">
                            <input type="hidden" name="url" value="{{ route('email-subscriptions.store') }}" />

                            <input type="text" name="name" class="form-control text-center tw-border-[#000000] tw-rounded-[0px] tw-border-[2px] mb-3 py-2 tw-h-[50px]" placeholder="Your first name" required />
                            <input type="email" name="email" class="form-control text-center tw-border-[#000000] tw-rounded-[0px] tw-border-[2px] mb-3 py-2 tw-h-[50px]" placeholder="Your email address" required />

                            <div class="mb-5 pb-3">
                                <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">KEEP ME POSTED!</button>
                            </div>
                        </form>

                        <a href="mailto:bellynstudio@gmail.com" class="d-flex align-items-center justify-content-center text-black text-decoration-none">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle email-icon">
                                <div class="line-height-90">
                                    <i class="fa-solid fa-envelope font-size-md-120 font-size-xl-130"></i>
                                </div>
                            </div>
                            <div class="h-custom-3 ps-2">bellynstudio@gmail.com</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
