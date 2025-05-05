@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
    .card-text {
        position: absolute;
        top: 20%; /* Adjust based on container */
        left: 44%;
        transform: perspective(1200px) rotateX(20deg) rotateY(-16deg) rotateZ(4.06deg) scaleY(1.03);
        transform-origin: center;
        color: white;
        font-weight: bold;
        font-size: 1.7rem;
        pointer-events: none;
        text-align: center;
    }
</style>

<div>
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="{{ asset('img/nft-pass/img-1.png') }}" class="w-100" />

                    <p class="card-text">SPARKAGENT<br/>NFT Pass</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
