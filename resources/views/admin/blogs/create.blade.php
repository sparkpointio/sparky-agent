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
                <input type="text" class="form-control form-control-1 text-start px-3 py-3" id="title" name="title" required />
            </div>

            <div class="editor-container d-none mb-4">
                <label for="blog-body">Blog Body</label>
                <div class="editor font-size-100" id="blog-body"></div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <p class="mb-2">Banner</p>

                    <div class="tw-border-[1px] tw-border-solid tw-border-[#ced4da] mb-4">
                        <input type="file" name="banner" class="d-none" required />

                        <div class="d-flex align-items-center background-image-contain justify-content-center w-100 tw-h-[220px] tw-border-[1px] tw-border-[#423225] p-3 cursor-pointer" id="attach-blog-banner">
                            <div class="text-center">Please click here to attach the banner.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="status">Status</label>
                <select class="form-select form-control-4 px-3 py-3" id="status" name="status" required>
                    <option value="Draft">Draft</option>
                    <option value="Coming Soon">Coming Soon</option>
                    <option value="Published">Published</option>
                </select>
            </div>

            <button type="submit" class="btn btn-custom-1 px-4" id="save-btn">Save Blog</button>
        </form>
    </div>
</main>
@endsection
