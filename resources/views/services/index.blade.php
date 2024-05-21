@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[88px]">
        <div class="py-5 position-relative">
            <div class="position-absolute w-100 tw-left-[0] tw-top-[0] background-image-cover tw-min-h-[calc(80vh-88px)] tw-z-[1]"></div>

            <div class="container tw-z-[2] position-relative pb-sm-5">
                <div class="pt-3">
                    <h1 class="cardo-bold text-center tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 px-4 px-md-0 mb-5 pb-3">Services</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-11 col-xxl-10">
                        <div class="row justify-content-center align-items-stretched">
                            <div class="col-11 col-sm-10 col-md-6 py-5 px-4 p-sm-5 bg-color-1">
                                <p class="text-center text-md-start cardo-bold tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 mb-4">Safeguard your rights and protect your family's well-being</p>
                                <p class="text-center text-md-start text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-4">Catering to the diverse needs of our clients, Peres Family Law offers a comprehensive range of services tailored to address various aspects of family law.</p>
                                <p class="text-center text-md-start text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">From divorce and custody proceedings to mediation, move-away actions, and spousal and child support matters, our seasoned team is dedicated to providing steadfast advocacy and personalized legal solutions.</p>
                            </div>

                            <div class="col-11 col-sm-10 col-md-6 p-0 background-image-cover tw-min-h-[calc(100vh-88px)] sm:tw-min-h-[calc(90vh-88px)] md:tw-min-h-[initial] tw-bg-[center_top_-70px] md:tw-bg-[center_top_50%]">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-4 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Divorce and custody proceedings</p>
                    </div>

                    <div class="col-6 col-md-4 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Mediation</p>
                    </div>

                    <div class="col-6 col-md-4 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Move-away actions</p>
                    </div>

                    <div class="col-6 col-md-3 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Spousal and child support</p>
                    </div>

                    <div class="col-6 col-md-3 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Attorney fee disputes</p>
                    </div>

                    <div class="col-6 col-md-3 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">Prenuptial/<br />postnuptial agreements</p>
                    </div>

                    <div class="col-6 col-md-3 px-2 px-sm-3 px-md-4 px-lg-5 mb-5">
                        <div class="mb-4">
                            <img src="{{ asset('img/home/bg.png') }}" class="w-100" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-center articulat-bold text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 mb-0">High net worth cases</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="pb-5">
            <p class="cardo-bold text-color-1 text-center tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 px-4 px-md-0 mb-5 pb-5">Discover Our Range of Services</p>

            <div class="row align-items-center px-3 px-md-2 mb-5">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">Divorce and custody proceedings</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">Our firm specializes in navigating the complexities of divorce and custody cases with a focus on protecting our clients' rights and preserving family relationships.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">Whether amicable or contentious, we provide strategic guidance and representation to ensure fair outcomes that prioritize the well-being of all involved, especially children.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center px-3 px-md-2 mb-5">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">Mediation</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">Through our mediation services, we offer a collaborative approach to resolving family disputes, providing a neutral and constructive environment for parties to communicate and reach mutually beneficial agreements.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">With skilled facilitation and a commitment to understanding each party's concerns, we help clients navigate challenging issues such as property division, child custody, and support arrangements with efficiency and respect.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center px-3 px-md-2 mb-5">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">Move-away actions</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">When one parent seeks to relocate with the children, our firm offers experienced legal guidance to address the complex legal considerations involved in move-away actions.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">We advocate for our clients' parental rights while also considering the best interests of the children, striving to reach solutions that maintain meaningful parent-child relationships despite geographical distance.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center px-3 px-md-2 mb-5">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">Spousal and child support</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">We understand the financial implications of divorce and the importance of fair and sustainable support arrangements for both spouses and children.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">Our team provides knowledgeable guidance on spousal and child support matters, ensuring that agreements are reached in accordance with applicable laws and that the financial needs of all parties are addressed effectively.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center px-3 px-md-2 mb-5">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">Attorney fee disputes</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">In cases where disputes arise over attorney fees, our firm works diligently to resolve conflicts efficiently and fairly.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">We employ negotiation, mediation, or litigation strategies as necessary to protect our clients' interests while seeking to minimize unnecessary expenses and delays in the resolution of legal matters.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center px-3 px-md-2 mb-5">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">Prenuptial/postnuptial agreements</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">For couples considering marriage or seeking to protect their assets, we offer comprehensive services for drafting and negotiating prenuptial and postnuptial agreements.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">With meticulous attention to detail and a focus on clear communication, we help clients establish agreements that provide clarity and protection in the event of divorce or other unforeseen circumstances.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center px-3 px-md-2">
                <div class="col-md-6 col-lg-5 px-0">
                    <div class="w-100 tw-pt-[100%] background-image-cover"></div>
                </div>

                <div class="col-md-6 col-lg-7 px-0 bg-color-2">
                    <div class="px-3 py-5 p-sm-5">
                        <p class="cardo-bold text-color-3 text-center text-md-start tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] font-size-200 font-size-lg-210 font-size-xl-270 mb-0">High net worth cases</p>

                        <div class="text-center text-lg-start">
                            <img src="{{ asset('img/home/bg.png') }}" class="py-4 my-2 tw-w-[250px] sm:tw-w-[260px] md:tw-w-[220px] lg:tw-w-[200px] xl:tw-w-[245px] xxl:tw-w-[260px]" alt="{{ config('app.name') }}" />
                        </div>

                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-4">At Peres Family Law, we specialize in high-net-worth divorce cases, offering unrivaled expertise in complex property division and asset protection.</p>
                        <p class="text-black tw-leading-[1.2em] text-center text-md-start font-size-120 font-size-xl-130 mb-0">With a proven track record in guiding clients through intricate financial landscapes, we provide strategic counsel to safeguard your assets and secure your future. Trust our experienced team to navigate the complexities of high-asset divorces with precision and discretion.</p>
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
                                    <p class="cardo-bold tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-white font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 mb-4">Peres Family Law is here to provide you with personalized legal solutions tailored to your unique situation.</p>
                                    <p class="text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 px-4 px-md-0 mb-4">Whether you're facing complex divorce proceedings, custody disputes, or navigating spousal and child support agreements, our dedicated team is here for you.</p>
                                    <p class="text-white tw-leading-[1.2em] font-size-120 font-size-xl-130 px-4 px-md-0 mb-5">Our goal is to empower you with the knowledge and confidence necessary to navigate the complexities of family law with ease and peace of mind.</p>

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
