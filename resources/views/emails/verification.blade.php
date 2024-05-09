@extends('layouts.email')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: Arial, serif;
            color:black;
        }
    </style>

    <style>

    </style>
@endsection

@section('body')
    <h5 class="mb-4 pb-2">Verify Your Email Address</h5>

    <p>Hello {{ $user->name }},</p>
    <p>Thank you for signing up! Please click the button below to verify your email address:</p>

    <p class="pb-3" style="padding-top:15px">
        <a href="{{ $url }}" class="text-decoration-none px-4 py-2 btn-custom-1">Verify Email Address</a>
    </p>

    <p>If you didn't sign up for an account, you can safely ignore this email.</p>

    <p class="text-break">If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: <a href="{{ $url }}" class="text-black">{{ $url }}</a></p>

    <p class="mb-0">Best regards,</p>
    <p class="mb-0">{{ config('app.name') }}</p>
@endsection
