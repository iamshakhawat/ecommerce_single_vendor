@extends('frontend-template')
@section('content')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">{{ $category[0]->category_name }} - ({{ $category[0]->total_product }})
                        </h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @if (count($products) > 0)
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box_main">
                                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                                <p class="price_text"> <span style="color: #e78b00;">$
                                                        {{ $product->price }}</span></p>
                                                <div class="tshirt_img">
                                                    <img style="height: 320px"
                                                        src="{{ asset("upload/products/$product->photo") }}">
                                                </div>
                                                <div class="btn_main">
                                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                                    <div class="seemore_bt"><a href="{{ route('product',$product->slug) }}">See More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <h3 class="text-muted text-center">No Product Found</h3>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($products) > 0)
                <div class="row justify-content-center align-items-center">
                    {{ $products->appends($_GET)->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
@endsection
