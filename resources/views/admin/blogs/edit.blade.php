@extends('layouts.app')

@section('title', 'Admin Edit Blog')

@section('content')
<main class="main">
    <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px]">
        <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3 pb-3">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none">
                    <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $blog['title'] }}</li>
        </ol>

        <div class="px-3 mb-3">
            <a href="{{ route('blog.content', $blog['url_slug']) }}" class="btn btn-custom-1 font-size-80 px-3">View Blog</a>
        </div>
    </div>

    <div class="animated fadeIn pb-5">
        <form id="blog-form">
            <input type="hidden" name="url" value="{{ route('admin.blogs.store') }}" />
            <input type="hidden" name="id" value="{{ $blog['id'] }}" />

            <div class="mb-4">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control rounded-0 text-start px-3 py-3" id="title" name="title" value="{{ $blog['title'] }}" required />
            </div>

            <div class="mb-4">
                <label for="author">Author</label>
                <input type="text" class="form-control text-start rounded-0 px-3 py-2" id="author" name="author" value="{{ $blog['author'] }}" required />
            </div>

            <div class="mb-4">
                <label for="categories">Categories</label>
                <select class="form-select form-control-4 rounded-0 px-3 py-2 d-none" id="categories" name="categories[]" data-placeholder="Choose categories" style="height:initial" multiple required>
                    <option value="Reviews" {{ in_array('Reviews', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Reviews</option>
                    <option value="Business" {{ in_array('Business', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Business</option>
                    <option value="Lifestyle" {{ in_array('Lifestyle', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Lifestyle</option>
                    <option value="Events" {{ in_array('Events', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Events</option>
                    <option value="Guides" {{ in_array('Guides', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Guides</option>
                    <option value="General" {{ in_array('General', json_decode($blog['categories'],true)) ? 'selected' : '' }}>General</option>
                    <option value="Motherhood" {{ in_array('Motherhood', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Motherhood</option>
                    <option value="Travel" {{ in_array('Travel', json_decode($blog['categories'],true)) ? 'selected' : '' }}>Travel</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description">Blog Description</label>
                <textarea class="form-control text-start rounded-0 px-3 py-2" id="description" name="description" style="height:90px"  required>{{ $blog['description'] }}</textarea>
            </div>

            <div class="d-none" id="blog-body-content">{!! $blog['body'] !!}</div>

            <div class="editor-container d-none mb-4">
                <label for="blog-body">Blog Body</label>
                <div class="editor font-size-100" id="blog-body"></div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <p class="mb-2">Banner</p>

                    <div class="tw-border-[1px] tw-border-solid tw-border-[#ced4da]">
                        <input type="file" name="banner" class="d-none" />

                        <div class="d-flex align-items-center background-image-contain justify-content-center w-100 tw-h-[220px] tw-border-[1px] tw-border-[#423225] p-3 cursor-pointer" style="background-image:url('{{ $blog['banner'] }}')" id="attach-blog-banner">
                            @if(!$blog['banner'])
                            <div class="text-center">Please click here to attach the banner.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="status">URL Slug</label>

                <div class="input-group mb-3">
                    <span class="input-group-text rounded-0 py-2">{{ config('app.url') }}/blog/</span>
                    <input type="text" class="form-control rounded-0 py-2" placeholder="my-adventure" style="height:initial" id="url-slug" name="url_slug" value="{{ $blog['url_slug'] }}" required>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="status">Status</label>
                        <select class="form-select form-control-4 rounded-0 px-3 py-2" id="status" name="status" style="height:initial" required>
                            <option value="Draft" {{ $blog['status'] == 'Draft' ? 'selected' : '' }}>Draft</option>
                            <option value="Coming Soon" {{ $blog['status'] == 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
                            <option value="Published" {{ $blog['status'] == 'Published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="">
                        <label for="status">Featured</label>
                        <select class="form-select form-control-4 rounded-0 px-3 py-2" id="status" name="is_featured" style="height:initial" required>
                            <option value="0" {{ $blog['is_featured'] == '0' ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $blog['is_featured'] == '1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-custom-1 px-5" id="save-btn">Save Blog</button>
        </form>
    </div>
</main>
@endsection
