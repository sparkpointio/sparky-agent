@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div>
    @include('home.includes.nav')
    {{--  Test commit.  --}}
    <div class="tw-pt-[74px]">
        <div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg.png') }}')">
            <div style="background: rgb(206,212,218); background: linear-gradient(90deg, rgba(206,212,218,1) 50%, rgba(255,255,255,0) 100%)">
                <div class="container">
                    <div class="row align-items-center tw-min-h-[calc(100vh-74px)]">
                        <div class="col-md-9 col-lg-6 py-5">
                            <div class="text-center text-md-start pt-4 pb-5 py-sm-5">
                                <h1 class="bebas-neue tw-leading-[1em] h-custom-1 px-4 px-md-0 mb-4">Lorem Ipsum is Placeholder<br class="d-none d-lg-block" /> Text Commonly Used in the Graphic Industries</h1>
                                <p class="text-body-secondary h-custom-3 px-4 px-md-0 mb-3">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                                <p class="text-body-secondary h-custom-3 px-4 px-md-0 mb-5">The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets.</p>

                                <div class="">
                                    <a href="#" target="_blank" rel="noreferrer" class="btn btn-custom-1 px-5 py-2 h-custom-3">Call to Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg.png') }}')">
        <div style="background: linear-gradient(270deg, rgba(206,212,218,1) 50%, rgba(255,255,255,0) 100%)">
            <div class="container">
                <div class="row justify-content-end align-items-center tw-min-h-[calc(100vh-78px)]">
                    <div class="col-md-12 col-lg-10 py-5">
                        <div class="text-center text-md-end pt-4 pb-5 py-sm-5">
                            <p class="bebas-neue tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-5">Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin, though it looks like it, and it actually says nothing,” Before & After magazine answered a curious reader,</p>

                            <div class="">
                                <a href="#" target="_blank" rel="noreferrer" class="btn btn-custom-1 px-5 py-2 h-custom-3">Call to Action</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container-fluid">
            <div class="row tw-min-h-[calc(100vh-78px)] align-items-stretch">
                <div class="col-md-7 bg-dark-subtle d-flex justify-content-end">
                    <div class="md:tw-max-w-[calc((720px/12)*7)] lg:tw-max-w-[calc((960px/12)*7)] xl:tw-max-w-[calc((1140px/12)*7)] xxl:tw-max-w-[calc((1320px/12)*7)] w-100 tw-px-[8px]">
                        <div class="h-100 d-flex align-items-center">
                            <div class="py-5 pe-md-5 text-center text-md-start">
                                <div class="py-5">
                                    <p class="bebas-neue tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 mb-4">The placeholder text,<br class="d-none d-lg-block" /> beginning with the line “Lorem ipsum dolor <br class="d-none d-lg-block" /> consectetur adipiscing elit”</p>
                                    <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 px-4 px-md-0 mb-4">It's a period filled with uncertainty and tough decisions. That's why we're here, offering steady support and expert legal guidance. Our team is committed to standing by your side throughout the process, ensuring your rights are protected and your voice is heard.</p>
                                    <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 px-4 px-md-0 mb-5">We believe in preserving family bonds and will work hard to reach a fair resolution that prioritizes your well-being and that of your loved ones. With our experience and dedication, you can trust us to navigate the challenges of divorce effectively.</p>

                                    <div class="">
                                        <a href="#" target="_blank" rel="noreferrer" class="btn btn-custom-1 px-5 py-2 font-size-130 h-custom-3 tw-pt-[0.55em!important]">Call to Action</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 background-image-cover p-0 tw-bg-[url('/img/home/img-5.webp')] tw-min-h-[calc(100vh-78px)] md:tw-min-h-[initial]" style="background-image:url('{{ asset('img/home/bg.png') }}')"></div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container py-5">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center bg-dark-subtle h-100 px-4 py-5 p-md-5">
                        <div class="text-center text-lg-start">
                            <p class="bebas-neue tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 mb-4">Creation timelines for the lorem ipsum passage vary, with some citing the 15th century and others the 20th.</p>
                            <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 px-md-0 mb-4">It's difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s.</p>
                            <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 px-md-0 mb-4">So how did the classical Latin become so incoherent? According to McClintock, a 15th century typesetter likely scrambled part of Cicero's De Finibus in order to provide placeholder text to mockup various fonts for a type specimen book.</p>
                            <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 px-md-0 mb-0">Although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 tw-min-h-[calc(100vh-78px)]">
                    <div class="background-image-cover h-100 tw-border-[solid] tw-border-solid tw-border-[rgb(206,212,218)] tw-border-[1px]" style="background-image:url('{{ asset('img/home/bg.png') }}')"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark-subtle">
        <div class="container-fluid">
            <div class="row tw-min-h-[calc(100vh-78px)] align-items-stretch">
                <div class="col-md-5 background-image-cover p-0 tw-min-h-[calc(100vh-78px)] md:tw-min-h-[initial]" style="background-image:url('{{ asset('img/home/bg.png') }}')"></div>

                <div class="col-md-7 bg-dark-subtle d-flex justify-content-start">
                    <div class="md:tw-max-w-[calc((720px/12)*7)] lg:tw-max-w-[calc((960px/12)*7)] xl:tw-max-w-[calc((1140px/12)*7)] xxl:tw-max-w-[calc((1320px/12)*7)] w-100 tw-px-[8px]">
                        <div class="h-100 d-flex align-items-center">
                            <div class="py-5 ps-md-5 text-center text-md-start">
                                <div class="py-5">
                                    <p class="bebas-neue tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 mb-4">Lorem ipsum was popularized in the 1960s with Letraset's dry-transfer sheets</p>
                                    <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 mb-4">Nick Richardson described the translation “like extreme Mallarmé, or a Burroughsian cut-up, or a paragraph of Finnegans Wake.</p>
                                    <p class="text-body-secondary tw-leading-[1.2em] h-custom-3 mb-5">Bits of it have surprising power: the desperate insistence on loving and pursuing sorrow. for instance, that is cheated out of its justification – an incomplete object that has been either fished for, or wished for.</p>

                                    <div class="">
                                        <a href="#" target="_blank" rel="noreferrer" class="btn btn-custom-1 px-5 py-2 h-custom-3 tw-pt-[0.55em!important]">Call to Action</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background-image-cover py-5 overflow-hidden" style="background-image:url('{{ asset('img/home/bg.png') }}')">
        <div class="container-fluid py-5">
            <div class="row tw-min-h-[calc(100vh-78px)] align-items-stretch">
                <div class="col-md-12 d-flex justify-content-end px-0">
                    <div class="bg-dark-subtle sm:tw-max-w-[540px] md:tw-max-w-[720px] lg:tw-max-w-[960px] xl:tw-max-w-[1140px] xxl:tw-max-w-[1320px] w-100 tw-px-[8px] position-relative">
                        <div class="position-absolute tw-top-[-65px] tw-left-[initial] sm:tw-left-[94px] lg:tw-left-[50px] xl:tw-left-[80px] xxl:tw-left-[100px] text-center tw-w-[calc(100%-16px)] sm:tw-w-[initial]">
                            <i class="fa-solid fa-quotes tw-text-[8em]"></i>
                        </div>

                        <div class="h-100 d-flex align-items-center">
                            <div class="pt-5 py-lg-5 text-center text-sm-start">
                                <div class="pt-5 py-lg-5">
                                    <div class="row align-items-center px-0">
                                        <div class="col-lg-3 px-0">
                                            <div class="px-sm-5 mb-5 mb-lg-0">
                                                <div class="px-4">
                                                    <p class="bebas-neue tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1.2em] h-custom-1 mb-0">What our clients say</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-9 px-0">
                                            <div class="bg-white px-sm-5 py-5 tw-ms-[4px] lg:tw-ms-[0]">
                                                <div class="px-4 pb-5">
                                                    <div id="carouselExampleIndicators" class="carousel slide carousel-dark position-relative">
                                                        <div class="carousel-indicators tw-bottom-[-50px]">
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        </div>

                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <p class="articulat-bold tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-black h-custom-2 mb-4">"Lorem ipsum is so ubiquitous because it is so versatile."</p>
                                                                <p class="text-black tw-leading-[1.2em] h-custom-3 mb-4">I’ve heard the argument that “lorem ipsum” is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we’re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.</p>
                                                                <p class="text-black tw-leading-[1.2em] h-custom-3 mb-4">- P.Y.</p>

                                                                <div class="d-flex justify-content-center justify-content-sm-start tw-text-[#ffda3f] font-size-170">
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="carousel-item">
                                                                <p class="articulat-bold tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-black h-custom-2 mb-4">"The strength of lorem ipsum is its weakness."</p>
                                                                <p class="text-black tw-leading-[1.2em] h-custom-3 mb-4">Lorem ipsum is so ubiquitous because it is so versatile. Select how many paragraphs you want, copy, paste, and break the lines wherever it is convenient. Real copy doesn't work that way.</p>
                                                                <p class="text-black tw-leading-[1.2em] h-custom-3 mb-4">But despite zealous cries for the demise of lorem ipsum, others, such as Karen McGrane, offer appeals for moderation.</p>
                                                                <p class="text-black tw-leading-[1.2em] h-custom-3 mb-4">- G.P.</p>

                                                                <div class="d-flex justify-content-center justify-content-sm-start tw-text-[#ffda3f] font-size-170">
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="pe-2">
                                                                        <i class="fa-solid fa-star"></i>
                                                                    </div>
                                                                    <div class="">
                                                                        <i class="fa-solid fa-star"></i>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('home.includes.footer')

@endsection
