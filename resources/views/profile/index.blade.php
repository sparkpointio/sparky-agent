@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div>
    @include('home.includes.nav')
    <div class="tw-pt-[74px]">
        <div class="container-fluid">
            <div class="row align-items-stretch">
                <div class="col-md-4 col-xl-3 background-image-cover p-0 md:tw-min-h-[calc(100vh-74px)]" style="background-image:url('{{ asset('img/home/bg.png') }}')">
                    <div class="d-flex justify-content-center w-100 h-100" style="background-color: rgba(206,212,218,0.9)">
                        <div class="px-4 px-md-5 py-5 mb-md-5 md:tw-mt-[10%]">
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
                    <div class="d-flex justify-content-center md:tw-max-w-[calc((720px/12)*8)] lg:tw-max-w-[calc((960px/12)*8)] xl:tw-max-w-[calc((1140px/12)*9)] xxl:tw-max-w-[calc((1320px/12)*9)] w-100">
                        <div class="flex-fill md:tw-ps-[35px] lg:tw-ps-[40px] xl:tw-ps-[45px] xxl:tw-ps-[50px] py-5">
                            <div>
                                <form id="profile-form">
                                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between">
                                        <div class="">
                                            <p class="h-custom-3 mb-4 mb-sm-0">Information</p>
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-custom-1 px-5 py-2 tw-w-[215px]" id="update-profile">Update Profile</button>
                                        </div>
                                    </div>

                                    <hr class="my-4" />

                                    <div class="row pt-4 pb-4">
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

                                        <div class="col-md-12" id="address-display">
                                            <p class="font-size-90 mb-0">Address</p>
                                            <input type="text" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] mt-1" id="address" value="{{ $user->completeAddress() }}" disabled />
                                        </div>

                                        <div class="col-md-12 address-fields d-none" id="address-update-input">
                                            <div>
                                                <label class="font-size-90">Country</label>
                                                <select name="country" class="form-control form-control-1 mb-3 py-2 tw-h-[45px]" required>
                                                    <option>Select your country:</option>
                                                    @foreach($countries as $i => $country)
                                                    <option value="{{ $i }}" {{ ($user['country'] == $i) ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="{{ $user['gmaps_address'] ? 'd-none' : '' }} address-fields" id="ph-address-selection">
                                                @include('address::form', ['model' => \App\Models\User::find(1)])
                                            </div>

                                            <div class="{{ !$user['gmaps_address'] ? 'd-none' : '' }}" id="gmaps-places-api-input">
                                                <div class="position-relative">
                                                    <label class="font-size-90">Address</label>
                                                    <input type="text" name="gmaps_address" class="form-control form-control-1 mb-3 tw-h-[45px]" value="{{ $user['gmaps_address'] ? json_decode($user['gmaps_address'],true)['description'] : '' }}" placeholder="Your address" data-url="{{ route('register.search-address') }}" data-value="{{ $user['gmaps_address'] }}" />

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

                                                <label class="font-size-90">House No., Street</label>
                                                <input type="text" name="street_2" class="form-control form-control-1 mb-3 py-2 tw-h-[45px]" value="{{ $user['street'] }}" placeholder="House No., Street" required />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="d-flex tw-mx-[-4px]">
                                                <button type="button" class="btn btn-custom-1-outline px-2 py-2 tw-w-[50%] sm:tw-w-[215px] mx-1 mt-3 d-none" id="cancel-update-profile">Cancel</button>
                                                <button type="submit" class="btn btn-custom-1 px-2 py-2 tw-w-[50%] sm:tw-w-[215px] mx-1 mt-3 d-none" id="save-profile">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <hr />

                            <div class="mt-5">
                                <p class="h-custom-3">Valid ID</p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative tw-pt-[100%]" style="border:2px solid #000000">
                                            <div class="position-absolute tw-bottom-[8%] tw-right-[8%] rounded-circle tw-w-[35px] tw-h-[35px] cursor-pointer d-flex justify-content-center align-items-center tw-z-[2]" id="select-valid-id" style="background-color:rgba(0,0,0,0.1)">
                                                <div>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </div>
                                            </div>

                                            <div class="position-absolute tw-top-[0] tw-left-[0] w-100 h-100 d-flex justify-content-center align-items-center background-image-contain tw-z-[1]" id="valid-id-display" style="background-image:url('{{ $user['valid_id'] }}')" data-value="{{ $user['valid_id'] }}">
                                                <div class="{{ $user['valid_id'] ? 'd-none' : '' }}" id="attach-valid-id-label">
                                                    <div class="text-center mb-2">
                                                        <i class="fa-solid fa-id-card font-size-260"></i>
                                                    </div>

                                                    <p class="font-size-80">Attach your Valid ID</p>
                                                </div>
                                            </div>
                                        </div>

                                        <form id="update-valid-id-form">
                                            <input type="hidden" name="url" value="{{ route('profile.update-valid-id') }}" class="tw-w-[0] tw-h-[0]" />
                                            <input type="file" name="valid_id" class="tw-w-[0] tw-h-[0]" />
                                        </form>

                                        <div class="row tw-mx-[-4px] d-none" id="update-valid-id-actions">
                                            <div class="col-6 px-1">
                                                <button type="button" class="btn btn-custom-1-outline font-size-80 px-3 py-2 w-100" id="cancel-update-valid-id">Cancel</button>
                                            </div>

                                            <div class="col-6 px-1">
                                                <button type="button" class="btn btn-custom-1 font-size-80 px-3 py-2 w-100" id="save-valid-id">Save Valid ID</button>
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
    </div>
</div>

@include('home.includes.footer')

@endsection
