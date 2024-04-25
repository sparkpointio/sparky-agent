@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[88px]">
        <div class="bg-color-1 py-5">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-5 col-lg-5 mb-4 mb-md-0">
                        <h1 class="cardo-bold text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 px-4 px-md-0 mb-4">Contact</h1>

                        <p class="text-white text-center text-md-start tw-leading-[1.2em] font-size-120 font-size-xl-130 px-4 px-md-0 mb-4">Get in touch with us today to schedule a consultation and take the first step towards resolving your family law matters.</p>

                        <div class="d-flex align-items-center justify-content-center justify-content-md-start font-size-140 font-size-xl-150 flex-wrap">
                            <div class="pe-3">
                                <a href="https://facebook.com/peresfamilylaw" target="_blank" class="text-white text-decoration-none">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </div>

                            <div class="px-3">
                                <a href="https://x.com/peresfamilylaw" target="_blank" class="text-white text-decoration-none">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>

                            <div class="px-3">
                                <a href="https://instagram.com/peresfamilylaw" target="_blank" class="text-white text-decoration-none">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>

                            <div class="ps-3">
                                <a href="https://www.linkedin.com/company/peres-family-law/" target="_blank" class="text-white text-decoration-none">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 ps-xxl-5">
                        <div class="text-white font-size-120 font-size-xl-130">
                            <a href="tel:650-409-7070" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-white mb-2">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="ps-4">
                                    650-409-7070
                                </div>
                            </a>

                            <a href="mailto:info@peresfamilylaw.com" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-white mb-2">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="ps-4">
                                    info@peresfamilylaw.com
                                </div>
                            </a>

                            <a href="https://maps.app.goo.gl/t69Wk9FxoExXZT358" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-white mb-2">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-map-marker-alt"></i>
                                </div>
                                <div class="ps-4">
                                    99 S Almaden Blvd, Suite 600, San Jose, CA 95113
                                </div>
                            </a>

                            <div class="d-flex justify-content-center justify-content-center justify-content-md-start mb-0">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="ps-4">
                                    Peres Family Law, 2108 N St. #4882, Sacramento, CA 95816
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row mb-sm-5">
            <div class="col-md-12">
                <div class="w-100 xxl:tw-mt-[-66px] xxl:tw-mb-[-30px] tw-h-[1053px] sm:tw-h-[997px] md:tw-h-[1130px] xl:tw-h-[684px]" id="calendly-widget"></div>
            </div>
        </div>
    </div>

    @include('home.includes.testimonial')
</div>

@include('home.includes.footer')

<script type="text/javascript">

</script>

@endsection
