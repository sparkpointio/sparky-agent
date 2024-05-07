@extends('layouts.app')

@section('title', 'Admin | Users')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="h6 mb-0 text-gray-800">Users</h6>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive font-size-90 p-1 mb-3">
            <div class="text-center py-5 my-5 loading-text">Loading</div>
            <table class="table table-bordered data-table d-none w-100" id="users-table" data-url="{{ route('admin.users.index') }}">
                <thead>
                    <tr>
                        <th class="align-middle">Name</th>
                        <th class="align-middle">Email Address</th>
                        <th class="align-middle">Date&nbsp;&amp; Time Registered</th>
                        <th class="align-middle">Role</th>
                        <th class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <a href="{{ route('admin.users.export-excel') }}" class="btn btn-custom-1 font-size-90 px-4" id="export-users">Export to Excel</a>
    </div>
</main>
@endsection
