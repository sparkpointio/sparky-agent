@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div>
    @include('home.includes.nav')

    <div class="tw-pt-[74px]">
        <div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg.png') }}')">
            <div style="background: rgb(206,212,218); background: linear-gradient(90deg, rgba(206,212,218,1) 50%, rgba(255,255,255,0) 100%)">
                <div class="container">
                    <div class="row align-items-center tw-min-h-[calc(100vh-74px)]">
                        <div class="col-md-9 col-lg-6 py-5">
                            <div class="text-center text-md-start pt-4 pb-5 py-sm-5">
                                <div class="font-size-xl-80">
                                    <p class="bebas-neue text-black h-custom-2 px-4 px-md-0 mb-3">FEATURED BLOG</p>
                                </div>

                                <h1 class="bebas-neue text-black h-custom-1 px-4 px-md-0 mb-4">{{ $featuredBlog ? $featuredBlog['title'] : 'Lorem Ipsum Dolor Sit Amet' }}</h1>
                                <p class="text-secondary tw-leading-[1.2em] h-custom-4 px-4 px-md-0 mb-5">{{ $featuredBlog ? $featuredBlog['body'] : 'Lorem Ipsum Dolor Sit Amet' }}</p>

                                <div class="">
                                    <a href="{{ route('blog.content', str_replace('%2F', ' ', rawurlencode($featuredBlog['title']))) }}" class="btn btn-custom-1 px-5 py-2 h-custom-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('blog.includes.recentBlogPosts')
</div>

@include('home.includes.footer')

@endsection
