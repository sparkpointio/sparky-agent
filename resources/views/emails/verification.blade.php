@extends('layouts.email')

@section('style')
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">--}}
{{--    @vite('resources/css/app.css')--}}
{{--    <style>--}}
{{--        * {--}}
{{--            font-family: Arial, serif;--}}
{{--            color:black;--}}
{{--        }--}}
{{--    </style>--}}

    <style>
        /*! CSS Used from: https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css */
        :root{--bs-blue:#0d6efd;--bs-indigo:#6610f2;--bs-purple:#6f42c1;--bs-pink:#d63384;--bs-red:#dc3545;--bs-orange:#fd7e14;--bs-yellow:#ffc107;--bs-green:#198754;--bs-teal:#20c997;--bs-cyan:#0dcaf0;--bs-black:#000;--bs-white:#fff;--bs-gray:#6c757d;--bs-gray-dark:#343a40;--bs-gray-100:#f8f9fa;--bs-gray-200:#e9ecef;--bs-gray-300:#dee2e6;--bs-gray-400:#ced4da;--bs-gray-500:#adb5bd;--bs-gray-600:#6c757d;--bs-gray-700:#495057;--bs-gray-800:#343a40;--bs-gray-900:#212529;--bs-primary:#0d6efd;--bs-secondary:#6c757d;--bs-success:#198754;--bs-info:#0dcaf0;--bs-warning:#ffc107;--bs-danger:#dc3545;--bs-light:#f8f9fa;--bs-dark:#212529;--bs-primary-rgb:13,110,253;--bs-secondary-rgb:108,117,125;--bs-success-rgb:25,135,84;--bs-info-rgb:13,202,240;--bs-warning-rgb:255,193,7;--bs-danger-rgb:220,53,69;--bs-light-rgb:248,249,250;--bs-dark-rgb:33,37,41;--bs-white-rgb:255,255,255;--bs-black-rgb:0,0,0;--bs-body-color-rgb:33,37,41;--bs-body-bg-rgb:255,255,255;--bs-font-sans-serif:system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--bs-font-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--bs-gradient:linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));--bs-body-font-size:1rem;--bs-body-font-weight:400;--bs-body-line-height:1.5;--bs-body-color:#212529;--bs-body-bg:#fff;--bs-border-width:1px;--bs-border-style:solid;--bs-border-color:#dee2e6;--bs-border-color-translucent:rgba(0, 0, 0, 0.175);--bs-border-radius:0.375rem;--bs-border-radius-sm:0.25rem;--bs-border-radius-lg:0.5rem;--bs-border-radius-xl:1rem;--bs-border-radius-2xl:2rem;--bs-border-radius-pill:50rem;--bs-link-color:#0d6efd;--bs-link-hover-color:#0a58ca;--bs-code-color:#d63384;--bs-highlight-bg:#fff3cd;}
        *,::after,::before{box-sizing:border-box;}
        @media (prefers-reduced-motion:no-preference){
            :root{scroll-behavior:smooth;}
        }
        body{margin:0;-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:transparent;}
        hr{margin:1rem 0;color:inherit;border:0;border-top:1px solid;opacity:.25;}
        h5{margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;}
        h5{font-size:1.25rem;}
        p{margin-top:0;margin-bottom:1rem;}
        a{text-decoration:underline;}
        img{vertical-align:middle;}
        table{caption-side:bottom;border-collapse:collapse;}
        tbody,td,tr{border-color:inherit;border-style:solid;border-width:0;}
        .d-inline-block{display:inline-block!important;}
        .border-0{border:0!important;}
        .w-100{width:100%!important;}
        .my-4{margin-top:1.5rem!important;margin-bottom:1.5rem!important;}
        .mb-0{margin-bottom:0!important;}
        .mb-4{margin-bottom:1.5rem!important;}
        .p-3{padding:1rem!important;}
        .px-3{padding-right:1rem!important;padding-left:1rem!important;}
        .px-4{padding-right:1.5rem!important;padding-left:1.5rem!important;}
        .py-2{padding-top:.5rem!important;padding-bottom:.5rem!important;}
        .py-4{padding-top:1.5rem!important;padding-bottom:1.5rem!important;}
        .pb-2{padding-bottom:.5rem!important;}
        .pb-3{padding-bottom:1rem!important;}
        .ps-5{padding-left:3rem!important;}
        .text-start{text-align:left!important;}
        .text-center{text-align:center!important;}
        .text-decoration-none{text-decoration:none!important;}
        .text-break{word-wrap:break-word!important;word-break:break-word!important;}
        .text-black{--bs-text-opacity:1;}
        @media (min-width:768px){
            .p-md-5{padding:3rem!important;}
            .px-md-4{padding-right:1.5rem!important;padding-left:1.5rem!important;}
            .py-md-0{padding-top:0!important;padding-bottom:0!important;}
            .py-md-5{padding-top:3rem!important;padding-bottom:3rem!important;}
        }
        /*! CSS Used from: http://[::1]:5173/resources/css/app.css */
        html,body{scroll-behavior:auto!important;-webkit-scroll-behavior:auto!important;-moz-scroll-behavior:auto!important;-ms-scroll-behavior:auto!important;}
        *{font-family:"Montserrat", sans-serif;color:#000000;}
        .text-black{color:#000000!important;}
        .text-white{color:#ffffff!important;}
        a:hover{color:#BB9329;}
        .btn-custom-1{border-radius:0;background-color:#222222;color:#ffffff;border:2px solid #222222;}
        .btn-custom-1:hover,.btn-custom-1:active,.btn-custom-1:focus,.btn-custom-1:disabled{background-color:#000000!important;color:#ffffff!important;border:2px solid #000000;}
        .bg-color-1{background-color:#d7dce0!important;}
        /*! CSS Used from: Embedded */
        *{font-family:Arial, serif;color:black;}
    </style>
@endsection

@section('body')
    <h5 class="mb-4 pb-2">Verify Your Email Address</h5>

    <p>Hello {{ $user->name }},</p>
    <p>Thank you for signing up! Please click the button below to verify your email address:</p>

    <p class="pb-3" style="padding-top:15px">
        <a href="{{ $url }}" class="text-decoration-none px-4 py-2 btn-custom-1 text-white">Verify Email Address</a>
    </p>

    <p>If you didn't sign up for an account, you can safely ignore this email.</p>

    <p class="text-break">If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: <a href="{{ $url }}" class="text-black">{{ $url }}</a></p>

    <p class="mb-0">Best regards,</p>
    <p class="mb-0">{{ config('app.name') }}</p>
@endsection
