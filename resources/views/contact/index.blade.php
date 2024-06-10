@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[74px]">
        <div class="bg-color-1 py-5">
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-md-5 col-lg-5 mb-4 mb-md-0">
                        <h1 class="text-center text-md-start h-custom-1 bebas-neue px-4 px-md-0 mb-3">We're Here to Help</h1>

                        <p class="text-center text-md-start h-custom-4 px-4 px-md-0 mb-4">If you have any questions or need assistance, please get in touch with us using the information below or fill out the contact form.</p>

                        <div class="d-flex align-items-center justify-content-center justify-content-md-start font-size-160 font-size-xl-170 flex-wrap">
                            <div class="pe-3">
                                <a href="https://facebook.com/" target="_blank" class="text-decoration-none">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </div>

                            <div class="px-3">
                                <a href="https://x.com/" target="_blank" class="text-decoration-none">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>

                            <div class="px-3">
                                <a href="https://instagram.com/" target="_blank" class="text-decoration-none">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 ps-xxl-5">
                        <div class="text-white font-size-120 font-size-xl-130">
                            <a href="tel:650-409-7070" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-white mb-4">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="ps-4">
                                    123-123-1234
                                </div>
                            </a>

                            <a href="mailto:{{ config('mail.mailers.smtp.username') }}" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-white mb-4">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="ps-4">
                                    {{ config('mail.mailers.smtp.username') }}
                                </div>
                            </a>

                            <a href="https://maps.app.goo.gl/t69Wk9FxoExXZT358" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-white mb-0">
                                <div class="tw-min-w-[23px] text-center">
                                    <i class="fa-solid fa-map-marker-alt"></i>
                                </div>
                                <div class="ps-4">
                                    123 Main Street, Suite 600, San Jose, CA 12345
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color-2">
        <div class="container py-5">
            <div class="d-flex flex-column flex-md-row align-items-md-end py-5">
                <div class="col-md-6 px-0 mb-5 mb-md-0">
                    <p class="h-custom-2 bebas-neue text-center text-md-start mb-4">Send Us a Message</p>
                    <p class="h-custom-4 text-center text-md-justify mb-5">If you prefer, you can also reach out to us by filling out the form below. We aim to respond to all inquiries within 24 hours during business days.</p>

                    <div class="">
                        <img src="{{ asset('img/contact/img-1.webp') }}" class="w-100" />
                    </div>
                </div>

                <div class="col-md-6 ps-md-4 ps-xl-5 pe-0">
                    <div class="d-flex flex-column justify-content-between ps-lg-4 pt-3 h-100">
                        <div>
                            <form id="contact-form">
                                <input type="hidden" name="url" value="{{ route('contact.sendMessage') }}" />

                                <div class="mb-3" style="border-bottom:2px solid white">
                                    <input type="text" name="name" class="form-control form-control-1 font-size-lg-110 px-3 px-md-4 py-2 py-xl-3 mb-3" placeholder="Your Name (required)" required />
                                    <input type="text" name="email" class="form-control form-control-1 font-size-lg-110 px-3 px-md-4 py-2 py-xl-3 mb-3" placeholder="Your Email (required)" required />
                                    <textarea name="message" class="form-control form-control-1 font-size-lg-110 px-3 px-md-4 py-2 py-xl-3 mb-3" placeholder="Your Message" style="height:181px" required></textarea>
                                </div>

                                <div class="text-center text-md-start">
                                    <button type="submit" class="btn btn-custom-1 font-size-md-90 font-size-lg-110 px-5 py-3 w-100">
                                        <span class="px-sm-4 px-lg-5 text-white">SEND MESSAGE</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

<script type="text/javascript">

</script>

@endsection
