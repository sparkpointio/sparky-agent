@extends('layouts.app')

@section('title', 'Admin Blogs')

@section('content')
<main class="main">
    <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px]">
        <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3 pb-3">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none">
                    <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="animated fadeIn pb-5">
        <form id="blog-form">
            <input type="hidden" name="url" value="{{ route('admin.blogs.store') }}" />

            <div class="mb-4">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control text-start rounded-0 px-3 py-2" id="title" name="title" required />
            </div>

            <div class="mb-4">
                <label for="author">Author</label>
                <input type="text" class="form-control text-start rounded-0 px-3 py-2" id="author" name="author" required />
            </div>

            <div class="mb-4">
                <label for="categories">Categories</label>
                <select class="form-select form-control-4 rounded-0 px-3 py-2" id="categories" name="categories[]" data-placeholder="Choose categories" style="height:initial" multiple required>
                    <option value="Reviews">Reviews</option>
                    <option value="Business">Business</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Events">Events</option>
                    <option value="Guides">Guides</option>
                    <option value="General">General</option>
                    <option value="Motherhood">Motherhood</option>
                    <option value="Travel">Travel</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description">Blog Description</label>
                <textarea class="form-control text-start rounded-0 px-3 py-2" id="description" name="description" style="height:90px" required></textarea>
            </div>

            <div class="editor-container d-none mb-4">
                <label for="blog-body">Blog Body</label>
                <div class="editor font-size-100" id="blog-body"></div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <p class="mb-2">Banner</p>

                    <div class="tw-border-[1px] tw-border-solid tw-border-[#ced4da]">
                        <input type="file" name="banner" class="d-none" required />

                        <div class="d-flex align-items-center background-image-contain justify-content-center w-100 tw-h-[220px] tw-border-[1px] tw-border-[#423225] p-3 cursor-pointer" id="attach-blog-banner">
                            <div class="text-center">Please click here to attach the banner.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="status">URL Slug</label>

                <div class="input-group mb-3">
                    <span class="input-group-text rounded-0 py-2">{{ config('app.url') }}/blog/</span>
                    <input type="text" class="form-control rounded-0 py-2" placeholder="my-adventure" style="height:initial" id="url-slug" name="url_slug" required>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label for="status">Status</label>
                        <select class="form-select rounded-0 px-3 py-2" id="status" name="status" style="height:initial" required>
                            <option value="Draft">Draft</option>
                            <option value="Coming Soon">Coming Soon</option>
                            <option value="Published">Published</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="">
                        <label for="status">Featured</label>
                        <select class="form-select form-control-4 rounded-0 px-3 py-2" id="status" name="is_featured" style="height:initial" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-custom-1 px-5" id="save-btn">Save Blog</button>
        </form>
    </div>
</main>
@endsection
