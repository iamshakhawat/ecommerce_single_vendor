@extends('frontend-template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <img src="{{ asset('frontend/images/laptop-img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="">
                    <h2>{{ $product->product_name }}</h2>
                    <h4>${{ $product->price }}</h4>
                    <p>Item Left: {{ $product->quantity }}</p>
                    <p>{{ $product->short_description }}</p>
                    <p>{{ $product->long_description }}</p>
                    <h2>{{ $product->product_name }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
