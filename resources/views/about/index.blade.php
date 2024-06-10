@extends('layouts.app')

@section('title', 'About')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[88px]">
        <div class="py-5 position-relative">
            <div class="position-absolute w-100 tw-left-[0] tw-top-[0] background-image-cover tw-min-h-[calc(80vh-88px)] tw-z-[1]"></div>

            <div class="container tw-z-[2] position-relative pb-sm-5">
                <div class="pt-3">
                    <h1 class="text-center tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 px-4 px-md-0 mb-5 pb-3">About</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-11 col-xxl-10">
                        <div class="row justify-content-center align-items-stretched">
                            <div class="col-11 col-sm-10 col-md-6 py-5 px-3 px-sm-4 p-md-5 bg-color-1">
                                <p class="text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 mb-4">Meet Atty. Ariel Peres,<br class="d-block d-md-none" /> Your Trusted Advocate in Family Law</p>
                                <p class="text-center text-md-start text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-4">Ariel F. Peres is a distinguished attorney specializing in family Law, serving clients in California. Holding bar licenses in both California and Massachusetts, Ariel brings a wealth of expertise and legal acumen to her practice.</p>
                                <p class="text-center text-md-start text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-4">She pursued her education at the University of Rhode Island before earning her law degree from Suffolk University Law School.</p>
                                <p class="text-center text-md-start text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Notably, Ariel was Supreme Judicial Court Rule 3:03 Certified from 2016-2017, showcasing her dedication to excellence.</p>
                            </div>

                            <div class="col-11 col-sm-10 col-md-6 p-0 background-image-cover tw-min-h-[calc(100vh-88px)] sm:tw-min-h-[calc(90vh-88px)] md:tw-min-h-[initial] tw-bg-[center_top_-70px] md:tw-bg-[center_top_50%] lg:tw-bg-[center_top_-80px] xl:tw-bg-[center_top_-100px]">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row tw-min-h-[calc(100vh-78px)] align-items-stretch">
            <div class="col-md-6 col-lg-7 background-image-cover p-0 tw-min-h-[calc(100vh-78px)] md:tw-min-h-[initial]"></div>

            <div class="col-md-6 col-lg-5 d-flex justify-content-start">
                <div class="md:tw-max-w-[calc((720px/12)*6)] lg:tw-max-w-[calc((960px/12)*5)] xl:tw-max-w-[calc((1140px/12)*5)] xxl:tw-max-w-[calc((1320px/12)*5)] w-100 tw-px-[8px]">
                    <div class="h-100 d-flex align-items-center">
                        <div class="py-5 ps-md-4 ps-xl-5 text-center text-md-start">
                            <div class="py-5">
                                <p class="tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-color-3 font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 mb-4">Focus on Family Law</p>
                                <p class="text-black tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-4">Throughout her career, Ariel has focused solely on family law, demonstrating a deep commitment to her clients' needs.</p>
                                <p class="text-black tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-4">She approaches each case with passion and determination, striving to provide efficient and effective solutions for marriage dissolution.</p>
                                <p class="text-black tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-5">With extensive experience in navigating complex financial and custody agreements, Ariel ensures that her clients' rights are protected and their interests are represented with utmost diligence.</p>

                                <div class="">
                                    <a href="https://calendly.com/peresfamilylaw/1hourconsultation" target="_blank" rel="noreferrer" class="btn btn-custom-2 px-5 py-2 font-size-120 font-size-xl-130 articulat-bold tw-pt-[0.55em!important]">Book a Consultation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-6">
        <div class="container-fluid">
            <div class="row tw-min-h-[calc(100vh-78px)] align-items-stretch">
                <div class="col-md-7 bg-color-1 d-flex justify-content-end">
                    <div class="md:tw-max-w-[calc((720px/12)*7)] lg:tw-max-w-[calc((960px/12)*7)] xl:tw-max-w-[calc((1140px/12)*7)] xxl:tw-max-w-[calc((1320px/12)*7)] w-100 tw-px-[8px]">
                        <div class="h-100 d-flex align-items-center">
                            <div class="py-5 pe-md-5 text-center text-md-start">
                                <div class="py-5">
                                    <p class="tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 mb-4">Compassionate Approach</p>
                                    <p class="text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 px-4 px-md-0 mb-4">Ariel F. Peres distinguishes herself through her compassionate approach to family law. Understanding the emotional toll that divorce can take on individuals and families, she prioritizes empathy and understanding in her practice.</p>
                                    <p class="text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 px-4 px-md-0 mb-5">With a focus on personalized attention and tailored solutions, Ariel strives to alleviate the stress and uncertainty associated with divorce proceedings. Clients can trust Ariel to provide steadfast advocacy and practical guidance every step of the way, empowering them to make informed decisions and move forward with confidence.</p>

                                    <div class="">
                                        <a href="https://calendly.com/peresfamilylaw/1hourconsultation" target="_blank" rel="noreferrer" class="btn btn-custom-2 px-5 py-2 font-size-130 font-size-120 font-size-xl-130 articulat-bold tw-pt-[0.55em!important]">Book a Consultation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 background-image-cover p-0 tw-min-h-[calc(100vh-78px)] md:tw-min-h-[initial]"></div>
            </div>
        </div>
    </div>

    @include('home.includes.testimonial')
</div>

@include('home.includes.footer')

@endsection
