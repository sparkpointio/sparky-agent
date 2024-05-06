<div class="bg-dark-subtle py-5">
    <div class="container py-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-7 col-sm-5 col-md-2 mb-5 mb-md-0">
                <div class="mb-4">
                    <a href="{{ route('home.index') }}" class="text-decoration-none d-block text-center">
                        <img src="{{ asset('img/home/logo.png') }}" class="tw-w-[100%] xl:tw-w-[80%] xxl:tw-w-[70%] d-inline" alt="{{ config('app.name') }}" />
                    </a>
                </div>

                <div class="d-flex justify-content-center align-items-center font-size-160 font-size-md-110 font-size-lg-130 font-size-xl-180 font-size-xxl-200 flex-wrap">
                    <div class="px-2">
                        <a href="#" target="_blank" rel="noreferrer" class="text-black text-decoration-none">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </div>

                    <div class="px-2">
                        <a href="#" target="_blank" rel="noreferrer" class="text-black text-decoration-none">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>

                    <div class="px-2">
                        <a href="#" target="_blank" rel="noreferrer" class="text-black text-decoration-none">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>

                    <div class="px-2">
                        <a href="#" target="_blank" rel="noreferrer" class="text-black text-decoration-none">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex justify-content-center mb-4 mb-md-0">
                    <div class="px-4 px-lg-0">
                        <div class="d-flex justify-content-center flex-wrap h-custom-4 mb-4 mb-lg-5">
                            <div class="px-2 mb-2 mb-lg-0">
                                <a class="text-decoration-none text-black" href="{{ route('home.index') }}">Home</a>
                            </div>

                            <div class="px-2 mb-0 mb-lg-0">
                                <a class="text-decoration-none text-black" href="{{ route('contact.index') }}">Contact</a>
                            </div>
                        </div>

                        <div class="text-center d-none d-md-block">
                            <div class="h-custom-4">
                                &copy; 2024 {{ config('app.name') }}.<br class="d-block d-lg-none" /> All rights reserved
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="h-custom-4">
                    <a href="tel:123-445-7890" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-black mb-4">
                        <div class="tw-min-w-[23px] text-center">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="ps-4">
                            123-456-7890
                        </div>
                    </a>

                    <a href="mailto:username@gmail.com" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-black mb-4">
                        <div class="tw-min-w-[23px] text-center">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="ps-4">
                            username@gmail.com
                        </div>
                    </a>

                    <a href="https://maps.app.goo.gl/t69Wk9FxoExXZT358" target="_blank" rel="noreferrer" class="d-flex text-decoration-none text-black mb-5 mb-md-0">
                        <div class="tw-min-w-[23px] text-center">
                            <i class="fa-solid fa-map-marker-alt"></i>
                        </div>
                        <div class="ps-4">
                            123 Main Street, Anytown, USA 12345
                        </div>
                    </a>

                    <div class="text-center d-block d-md-none">
                        <div class="">
                            &copy; {{ Carbon\Carbon::now()->format('Y') }}  {{ config('app.name') }}.<br class="d-block d-lg-none" /> All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
