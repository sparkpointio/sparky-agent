@extends('layouts.app')

@section('title', 'Admin Create Blog')

@section('content')
<main class="main">
    <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px]">
        <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3">
            <li class="breadcrumb-item active" aria-current="page">
                <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
            </li>
        </ol>

        <div class="px-3 mb-3">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-custom-1 font-size-80 px-3">Create Blog</a>
        </div>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive font-size-90 p-1">
            <div class="text-center py-5 my-5 loading-text">Loading</div>
            <table class="table table-bordered data-table d-none admin-table w-100" id="blogs-table" data-url="{{ route('admin.blogs.index') }}">
                <thead>
                <tr>
                    <th>Date&nbsp;&amp; Time</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</main>
@endsection
