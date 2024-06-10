@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[88px]">
        <div class="background-image-cover md:!tw-bg-[top_right_-15em] lg:!tw-bg-[top_right_-9em] xl:!tw-bg-center">
            <div class="container">
                <div class="row align-items-center tw-min-h-[calc(100vh-88px)]">
                    <div class="col-md-9 col-lg-6 py-5">
                        <div class="text-center text-md-start pt-4 pb-5 py-sm-5">
                            <p class="articulat-bold tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-color-2 font-size-120 font-size-xl-130 px-4 px-md-0 mb-4">FEATURED BLOG</p>
                            <h1 class="tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] text-color-1 font-size-200 font-size-lg-210 font-size-xl-270 font-size-xxl-290 px-4 px-md-0 mb-4">Thinking about reconciliation?</h1>
                            <p class="text-color-1 tw-leading-[1.2em] font-size-120 font-size-xl-130 px-4 px-md-0 mb-5">Considering reconciling? Reconciling can make sense for some couples and for some, it does not....</p>

                            <div class="">
                                <a href="{{ route('blog.content', 'thinking%20about%20reconciliation%3F') }}" class="btn btn-custom-1 px-5 py-2 font-size-120 font-size-xl-130 articulat-bold tw-pt-[0.55em!important]">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('blog.includes.recentBlogPosts')
    @include('blog.includes.section')

    @include('home.includes.testimonial')
</div>

@include('home.includes.footer')

@endsection
