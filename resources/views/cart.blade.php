@extends('layouts.user_panel')
@section('content')
<h3>Cart</h3>
@if (count($carts) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th style="width: 30px">Action</th>
            </tr>
        </thead>
        @php
            $price = 0;
            $totalproduct = 0;
        @endphp
        @foreach ($carts as $cart)
            @php
                $product = App\Models\Product::find($cart->product_id);
                $price = $price + $cart->price;
                $totalproduct = $totalproduct + $cart->quantity;
            @endphp
            <tr>
                <td>
                    <img style="height: 50px" src="{{ asset("upload/products/$product->photo") }}"
                        alt="{{ $product->product_name }}">
                </td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>$ {{ $cart->price }}</td>
                <td>
                    <a href="{{ route('removefromcart',$cart->id) }}" class="btn btn-danger btn-sm">X</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2">Total</td>
            <td> {{ $totalproduct }}</td>
            <td> ${{ $price }}</td>
        </tr>
    </table>
@else
    <h3 class="text-muted">No Product in Cart</h3>
@endif

@if (count($carts) > 0)
    <div class="row justify-content-end px-3">
        <a href="{{ route('checkout') }}" class="btn btn-warning rounded-0">Proceed to Checkout</a>
    </div>
@endif

@endsection
