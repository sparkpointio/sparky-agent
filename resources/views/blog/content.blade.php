@extends('layouts.app')

@section('title', $currentBlog['title'] . ' | Blog')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[88px] bg-dark-subtle">
        <div class="container-fluid">
            <div class="row tw-min-h-[calc(100vh-88px)] justify-content-center align-items-center pt-5 pt-lg-0">
                <div class="col-12 col-sm-10 col-md-8 col-lg-5 px-0 mb-5">
                    <div class="d-flex justify-content-center justify-content-lg-end">
                        <div class="sm:tw-max-w-[calc((540px/12)*10)] md:tw-max-w-[calc((720px/12)*8)] lg:tw-max-w-[calc((960px/12)*5)] xl:tw-max-w-[calc((1140px/12)*5)] xxl:tw-max-w-[calc((1320px/12)*5)] w-100">
                            <div class="lg:tw-ps-[26px] pe-lg-5">
                                <h1 class="text-center text-lg-start bebas-neue text-black h-custom-1 px-4 px-md-0 mb-3">{{ $currentBlog['title'] }}</h1>
                                <p class="text-black text-center text-lg-start h-custom-4 mb-4">Ariel Peres, Esq. | {{ Carbon\Carbon::parse($currentBlog['created_at'])->format('d-M-Y') }}</p>
                                <p class="text-black text-center text-lg-start h-custom-4 mb-0">{{ $currentBlog->getFirstTwoSentences() }}..</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-7 px-0 mb-lg-5">
                    <div class="background-image-cover tw-min-h-[calc(100vh-232px)] w-100" style="background-image:url('{{ $currentBlog['banner'] }}')"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10" id="blog-body">
                {!! file_get_contents($currentBlog['body']) !!}
{{--                <p class="text-black tw-leading-[1.2em] font-size-120 font-size-xl-130 text-justify mb-4">Considering reconciling? Reconciling can make sense for some couples and for some, it does not. Sometimes reconciliation can have a drastic financial impact (beware the bait and switch, see below!). I've had consultations where it became clear to me that a few simple fixes may do the trick.</p>--}}
{{--                <p class="text-black tw-leading-[1.2em] font-size-120 font-size-xl-130 text-justify mb-0">For example, one client in his initial consult mentioned his wife had said she did not feel like she was a priority to him. His initial plan was to meet with her at 8:00 a.m. at a coffee shop to "discuss things." I suggested that instead he should try to keep things light and invite her to a winery and hiking (two activities she has interest in). No kids-- just them and see how it goes. It went well! They are still together a year later and in a much better place. However, this is only one example where a thoughtful date changed the tone, and there are often much more complicated factors to consider.</p>--}}

{{--                <div class="row justify-content-center py-5">--}}
{{--                    <div class="col-md-10 col-lg-9">--}}
{{--                        <img src="{{ asset('img/blog/1/2.webp') }}" class="w-100" alt="{{ config('app.name') }}" />--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    @include('blog.includes.recentBlogPosts')
</div>

@include('home.includes.footer')

@endsection
