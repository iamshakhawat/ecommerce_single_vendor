@extends('frontend-template')
@section('content')
    <div class="container">
        <div class="row p-5 shadow my-5">
            <div class="col-md-4">
                <div class="box">
                    <img src="{{ asset("upload/products/$product->photo") }}" alt="Product Image">
                </div>
            </div>
            <div class="col-md-8">
                <div class="mt-5">
                    <h2>{{ $product->product_name }}</h2>
                    <h4>${{ $product->price }}</h4>
                    <small class=" m-0">Item Left: <strong class=" text-bold">{{ $product->quantity }}</strong>
                        @if ($product->quantity == 0)
                        <span class="text-danger">Out of Stock</span>
                        @elseif ($product->quantity <= 3)
                        <span class="text-danger">Low Stock</span>
                        @endif
                    </small>
                    <p class=" m-0 mb-2">{{ $product->short_description }}</p>
                    <h4 class="m-0 p-0">About Product:</h4>
                    <p class="m-0 pb-2">{{ $product->long_description }}</p>
                    @if ($product->quantity == 0)
                    <button class="btn btn-danger rounded-0 m-1">Out of Stock</button>
                    @else
                    <form action="{{ route('addproducttocart',$product->id) }}" method="POST" class="d-flex m-0">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <div class="col-md-6 p-0">
                            <input type="number" value="1" name="quantity" min="1"
                                max="{{ $product->quantity }}" class="form-control mb-2">
                            <button type="submit" class="btn btn-warning rounded-0 m-1">Add to Cart</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="container mb-5">
        <h1 class="fashion_taital">Related Product</h1>
        <div class="fashion_section_2">
            <div class="row">
                @if (count($releated) > 1)
                    @foreach ($releated as $related_product)
                        @if ($related_product->id != $product->id)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $related_product->product_name }}</h4>
                                    <h3 class="price_text">
                                        <span style="color: #e78b00;">$ {{ $related_product->price }}</span>
                                    </h3>
                                    <div class="tshirt_img">
                                        <a href="{{ route('product', $related_product->slug) }}">
                                            <img style="height: 320px"
                                                src="{{ asset("upload/products/$related_product->photo") }}">
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        @if ($related_product->quantity == 0)
                                        <button class="mr-2" style="outline:none;background:none;font-size:15px;color:#e90000">Out of Stock</button>
                                        @else
                                            <div>
                                                <form action="{{ route('addproducttocart' ) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $related_product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="mr-2" style="outline:none;background:none;font-size:15px;color:#e78b00">Buy Now</button>
                                                    <a href="{{ route('addtocartsingleproduct', $related_product->id) }}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                </form>
                                            </div>
                                        @endif
                                        <div class="seemore_bt w-25"><a
                                                href="{{ route('product', $product->slug) }}">See More</a></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-12">
                        <h3 class="text-muted text-center">No Related Product Found</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
