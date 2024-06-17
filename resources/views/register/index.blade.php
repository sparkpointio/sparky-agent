@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="background-image-cover position-relative" style="background-image:url('{{ asset('img/home/bg.png') }}')">
    <div class="position-absolute tw-top-[0] tw-left-[0] tw-bg-[rgba(255,255,255,0.9)] tw-z-[1] w-100 h-100"></div>
    @include('home.includes.nav')

    <div class="position-relative">
        <div class="position-absolute bg-color-1 w-100 h-100" style="top:0; left:0; opacity:0.5; z-index:1"></div>

        <div class="container position-relative" style="top:0; left:0; opacity:0.9; z-index:2">
            <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
                <div class="w-100 py-5">
                    <h1 class="text-center h-custom-2 pt-5 mb-5">We're Delighted to Have You!<br/> Register Here.</h1>

                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 col-xxl-5">

                            <form id="register-form" class="mb-4">
                                <input type="hidden" name="url" value="{{ route('register.submit') }}" />

                                <input type="text" name="first_name" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Your first name" required />
                                <input type="text" name="last_name" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Your last name" required />
                                <input type="email" name="email" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="Your email address" required />

                                <div>
                                    <select name="country" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" required>
                                        <option>Select your country:</option>
                                        @foreach($countries as $i => $country)
                                        <option value="{{ $i }}">{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-none address-fields" id="ph-address-selection">
                                    @include('address::form', ['model' => \App\Models\User::find(1)])
                                </div>

                                <div class="d-none" id="gmaps-places-api-input">
                                    <div class="position-relative">
                                        <input type="text" name="gmaps_address" class="form-control form-control-1 text-center mb-3 py-2 px-5 tw-h-[45px]" placeholder="Your address" data-url="{{ route('register.search-address') }}" data-value="" />

                                        <div class="position-absolute w-100 tw-top-[44px] tw-left-[0px] tw-z-[2] d-none spinner">
                                            <div class="list-group rounded-0" style="border:1px solid #222222">
                                                <div class="list-group-item p-3">
                                                    <div class="d-flex justify-content-center mb-2">
                                                        <div class="spinner-grow tw-w-[24px] tw-h-[24px]" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-center font-size-90">Loading</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-absolute tw-top-[11px] tw-right-[15px] d-none" id="address-is-valid">
                                            <i class="fa-solid fa-check-circle font-size-110 text-color-3"></i>
                                        </div>

                                        <div class="position-absolute w-100 tw-top-[44px] tw-left-[0px] tw-z-[2] d-none" id="search-address-result">
                                            <div class="position-absolute tw-top-[9px] tw-right-[10px] tw-z-[2]">
                                                <i class="fa-solid fa-times-circle cursor-pointer" id="close-address-result"></i>
                                            </div>
                                            <div class="list-group rounded-0" style="border:1px solid #222222"></div>
                                        </div>
                                    </div>

                                    <input type="text" name="street_2" class="form-control form-control-1 text-center mb-3 py-2 tw-h-[45px]" placeholder="House No., Street" required />
                                </div>

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
