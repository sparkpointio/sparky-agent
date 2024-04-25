@extends('layouts.admin')

@section('title', 'Admin Create Blog')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4 w-100">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>

            <div class="">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-custom-1 btn-sm px-4">Create Blog</a>
            </div>
        </div>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive p-1">
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
