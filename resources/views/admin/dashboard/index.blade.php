@extends('layouts.app')

@section('title', 'Admin | Dashboard')

@section('content')
<main class="main">
    <div class="d-flex justify-content-between flex-wrap tw-mx-[-16px]">
        <ol class="breadcrumb align-items-end bg-white py-0 px-3 mb-3">
            <li class="breadcrumb-item active" aria-current="page">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </li>
        </ol>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="row py-3">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card tw-border-l-[#222222] tw-border-l-[5px] shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-600 text-uppercase mb-1">Users</div>
                                <div class="h5 mb-0 font-weight-600">{{ number_format($userCount) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-color-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card tw-border-l-[#222222] tw-border-l-[5px] shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-600 text-uppercase mb-1">Email Subscriptions</div>
                                <div class="h5 mb-0 font-weight-600">{{ number_format($emailSubscriptionCount) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-color-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
