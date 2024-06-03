@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div>
    @include('home.includes.nav')
    <div class="tw-pt-[74px]">
        <div class="container-fluid">
            <div class="row align-items-stretch">
                <div class="col-md-4 col-xl-3 background-image-cover p-0 md:tw-min-h-[calc(100vh-74px)]" style="background-image:url('{{ asset('img/home/bg.png') }}')">
                    <div class="d-flex justify-content-center align-items-center w-100 h-100" style="background-color: rgba(206,212,218,0.9)">
                        <div class="px-4 px-md-5 py-5 mb-md-5">
                            <div>
                                <div class="d-flex justify-content-center px-lg-4 px-xl-3 px-xxl-4">
                                    <div class="tw-w-[200px] md:tw-w-[100%] tw-max-w-[226px]">
                                        <div class="position-relative w-100 tw-pt-[100%] rounded-circle background-image-cover mb-4" id="profile-photo" style="background-image:url('{{ Auth::user()->photo() }}'); border:4px solid #000000" data-value="{{ Auth::user()->photo() }}">
                                            <div class="position-absolute tw-bottom-[15%] tw-right-[15%] rounded-circle tw-w-[35px] tw-h-[35px] cursor-pointer d-flex justify-content-center align-items-center" id="select-user-photo" style="background-color:rgba(255,255,255,0.7)">
                                                <div>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <form id="update-user-photo-form">
                                            <input type="hidden" name="url" value="{{ route('profile.update-photo') }}" class="tw-w-[0] tw-h-[0]" />
                                            <input type="file" name="photo" class="tw-w-[0] tw-h-[0]" />
                                        </form>
                                    </div>
                                </div>

                                <div class="text-center mb-4 tw-mt-[-25px] d-none" id="update-profile-photo-actions">
                                    <button type="button" class="btn btn-custom-1-outline font-size-70 px-3 py-1 mb-1 tw-w-[99px]" id="cancel-update-profile-photo">Cancel</button>
                                    <button type="button" class="btn btn-custom-1 font-size-70 px-3 py-1 mb-1 tw-w-[99px]" id="save-profile-photo">Save Photo</button>
                                </div>

                                <div class="font-size-160 mb-2">
                                    <p class="h-custom-4 bebas-neue text-center text-break font-weight-500 mb-0">{{ $user['name'] }}</p>
                                </div>

                                <div class="font-size-80 mb-2">
                                    <p class="h-custom-4 text-center font-weight-500 text-break mb-0">{{ $user['email'] }}</p>
                                </div>

                                <div class="font-size-80">
                                    <p class="h-custom-4 text-center font-weight-500 text-break mb-0">Verified At: {{ \Carbon\Carbon::parse($user['email_verified_at'])->setTimezone('Asia/Singapore')->isoFormat('llll') }} (SGT)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-xl-9 d-flex justify-content-start">
                    <div class="d-flex justify-content-center align-items-center md:tw-max-w-[calc((720px/12)*8)] lg:tw-max-w-[calc((960px/12)*8)] xl:tw-max-w-[calc((1140px/12)*9)] xxl:tw-max-w-[calc((1320px/12)*9)] w-100">
                        <div class="flex-fill md:tw-ps-[35px] lg:tw-ps-[40px] xl:tw-ps-[45px] xxl:tw-ps-[50px] py-5">
                            <div id="profile-form">
                                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between pt-5">
                                    <div class="">
                                        <p class="h-custom-3 mb-4 mb-sm-0">Information</p>
                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-custom-1-outline px-5 py-2 tw-w-[215px] mb-2 mb-sm-0 d-none" id="cancel-update-profile">Cancel</button>
                                        <button type="button" class="btn btn-custom-1 px-5 py-2 tw-w-[215px] d-none" id="save-profile">Save Changes</button>
                                        <button type="button" class="btn btn-custom-1 px-5 py-2 tw-w-[215px]" id="update-profile">Update Profile</button>
                                    </div>
                                </div>

                                <hr class="my-4" />

                                <div class="row pt-4 pb-5 mb-4">
                                    <input type="hidden" name="url" value="{{ route('profile.update') }}" />

                                    <div class="col-sm-6">
                                        <label class="font-size-90" for="first-name">First Name</label>
                                        <input type="text" name="first_name" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] mt-1" id="first-name" value="{{ $user['first_name'] }}" required disabled />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="font-size-90" for="last-name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] mt-1" id="last-name" value="{{ $user['last_name'] }}" required disabled />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="font-size-90" for="birthdate">Birthdate</label>
                                        <input type="text" name="birthdate" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] mt-1" id="birthdate" value="{{ $user['birthdate'] ? \Carbon\Carbon::parse($user['birthdate'])->format('Y-F-d') : '' }}" data-value="{{ $user['birthdate'] }}" required disabled />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="font-size-90" for="contact-number">Contact Number</label>
                                        <input type="text" name="contact_number" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] mt-1 numeric-only" id="contact-number" value="{{ $user['contact_number'] }}" required disabled />
                                    </div>

                                    <div class="col-md-12">
                                        <label class="font-size-90" for="address">Address</label>
                                        <input type="text" name="address" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] mt-1" id="address" value="{{ $user['address'] }}" required disabled />
                                    </div>
                                </div>
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
