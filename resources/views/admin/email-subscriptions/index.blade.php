@extends('layouts.app')

@section('title', 'Admin | Email Subscriptions')

@section('content')
<main class="main">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="h6 mb-0 text-gray-800">Email Subscriptions</h6>
    </div>

    <div class="animated fadeIn pb-5">
        <div class="table-responsive font-size-90">
            <div class="text-center py-5 my-5 loading-text">Loading</div>
            <table class="table table-bordered data-table d-none">
                <thead>
                    <tr>
                        <th class="align-middle tw-min-w-[99px]">Date &amp; Time</th>
                        <th class="align-middle">Name</th>
                        <th class="align-middle">Email Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emailSubscriptions as $emailSubscription)
                    <tr>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($emailSubscription['created_at'])->setTimezone('Asia/Manila')->isoFormat('llll') }}</td>
                        <td class="align-middle">{{ json_decode($emailSubscription['data'], true)['name'] }}</td>
                        <td class="align-middle">{{ $emailSubscription['email'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
