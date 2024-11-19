@extends('layouts.app')

@section('title', 'Admin Edit Blog')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}" class="link-color-1">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog['title'] }}</li>
            </ol>
        </nav>
    </div>

    <div class="animated fadeIn pb-5">
        <form id="blog-form">
            <input type="hidden" name="url" value="{{ route('admin.blogs.store') }}" />
            <input type="hidden" name="id" value="{{ $blog['id'] }}" />

            <div class="mb-4">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control form-control-1 text-start px-3 py-3" id="title" name="title" value="{{ $blog['title'] }}" required />
            </div>

            <div class="d-none" id="blog-body-content">{!! $blog['body'] !!}</div>

            <div class="editor-container d-none mb-4">
                <label for="blog-body">Blog Body</label>
                <div class="editor font-size-100" id="blog-body"></div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <p class="mb-2">Banner</p>

                    <div class="tw-border-[1px] tw-border-solid tw-border-[#ced4da] mb-4">
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
                <label for="status">Status</label>
                <select class="form-select form-control-4 px-3 py-3" id="status" name="status" required>
                    <option value="Draft" {{ $blog['status'] == 'Draft' ? 'selected' : '' }}>Draft</option>
                    <option value="Coming Soon" {{ $blog['status'] == 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
                    <option value="Published" {{ $blog['status'] == 'Published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <button type="submit" class="btn btn-custom-1 px-4" id="save-btn">Save Blog</button>
        </form>
    </div>
</main>
@endsection
