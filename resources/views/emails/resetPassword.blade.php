@extends('layouts.email')

@section('style')
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">--}}
{{--    @vite('resources/css/app.css')--}}
{{--    <style>--}}
{{--        * {--}}
{{--            font-family: Arial, serif;--}}
{{--            color:black;--}}
{{--        }--}}
{{--        .text-white{color:#ffffff!important;}--}}
{{--        #logo {--}}
{{--            width:50px;--}}
{{--        }--}}
{{--        @media (min-width: 576px){--}}
{{--            #logo {--}}
{{--                width:60px;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}

    <style>
        /*! CSS Used from: https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css */
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
        .p-2{padding:.5rem!important;}
        .px-3{padding-right:1rem!important;padding-left:1rem!important;}
        .px-4{padding-right:1.5rem!important;padding-left:1.5rem!important;}
        .py-2{padding-top:.5rem!important;padding-bottom:.5rem!important;}
        .py-3{padding-top:1rem!important;padding-bottom:1rem!important;}
        .py-4{padding-top:1.5rem!important;padding-bottom:1.5rem!important;}
        .pb-2{padding-bottom:.5rem!important;}
        .pb-3{padding-bottom:1rem!important;}
        .text-start{text-align:left!important;}
        .text-center{text-align:center!important;}
        .text-decoration-none{text-decoration:none!important;}
        .text-break{word-wrap:break-word!important;word-break:break-word!important;}
        .text-black{--bs-text-opacity:1;}
        .text-white{--bs-text-opacity:1;}
        @media (min-width:576px){
            .py-sm-2{padding-top:.5rem!important;padding-bottom:.5rem!important;}
            .py-sm-4{padding-top:1.5rem!important;padding-bottom:1.5rem!important;}
        }
        @media (min-width:768px){
            .p-md-5{padding:3rem!important;}
            .px-md-4{padding-right:1.5rem!important;padding-left:1.5rem!important;}
            .py-md-0{padding-top:0!important;padding-bottom:0!important;}
            .py-md-5{padding-top:3rem!important;padding-bottom:3rem!important;}
        }
        /*! CSS Used from: http://[::1]:5173/resources/css/app.css */
        #logo {
            width:50px;
        }
        html,body{scroll-behavior:auto!important;-webkit-scroll-behavior:auto!important;-moz-scroll-behavior:auto!important;-ms-scroll-behavior:auto!important;}
        *{font-family:"Montserrat", sans-serif;color:#000000;}
        .text-black{color:#000000!important;}
        .text-white{color:#ffffff!important;}
        a:hover{color:#BB9329;}
        .btn-custom-1{border-radius:0;background-color:#222222;color:#ffffff;border:2px solid #222222;}
        .btn-custom-1:hover,.btn-custom-1:active,.btn-custom-1:focus,.btn-custom-1:disabled{background-color:#000000!important;color:#ffffff!important;border:2px solid #000000;}
        .bg-color-1{background-color:#d7dce0!important;}
        @media (min-width: 576px){
            #logo {
                width:60px;
            }
        }
        /*! CSS Used from: Embedded */
        *{font-family:Arial, serif;color:black;}
    </style>
@endsection

@section('body')
    <h5 class="mb-4 pb-2">Reset Password</h5>

    <p>Hello,</p>
    <p>You are receiving this email because we received a password reset request for your account.</p>

    <p class="pb-3" style="padding-top:15px">
        <a href="{{ $url }}" class="text-decoration-none px-4 py-2 btn-custom-1 text-white">Reset Password</a>
    </p>

    <p>This password reset link will expire in 60 minutes.</p>

    <p>If you did not request a password reset, no further action is required.</p>

    <p class="text-break">If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <a href="{{ $url }}" class="text-black">{{ $url }}</a></p>

    <p class="mb-0">Best regards,</p>
    <p class="mb-0">{{ config('app.name') }}</p>
@endsection
