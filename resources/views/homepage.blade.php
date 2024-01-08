@extends('frontend-template')
@section('content')
    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- banner section end -->
    <!-- banner bg main end -->
    <!-- fashion section start -->
        <div class="container">
            <h1 class="fashion_taital">Latest Product</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @php
                        $latestproducts = App\Models\Product::latest('id')
                            ->limit(6)
                            ->get();
                    @endphp
                    @foreach ($latestproducts as $latestproduct)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $latestproduct->product_name }}</h4>
                                <p class="price_text">Price <span style="color: #262626;">$
                                        {{ $latestproduct->price }}</span></p>
                                <div class="tshirt_img">
                                    <img src="{{ asset("upload/products/$latestproduct->photo") }}">
                                </div>
                                <div class="d-flex justify-content-between">
                                    @if ($latestproduct->quantity == 0)
                                        <button class="mr-2"
                                            style="outline:none;background:none;font-size:15px;color:#e90000">Out of
                                            Stock</button>
                                    @elseif ($latestproduct->quantity <= 3)
                                        <button class="mr-2"
                                            style="outline:none;background:none;font-size:15px;color:#e78b00">Low
                                            Stock</button>
                                    @else
                                        <div>
                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $latestproduct->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="mr-2"
                                                    style="outline:none;background:none;font-size:15px;color:#e78b00">Buy
                                                    Now</button>
                                                <a href="{{ route('addtocartsingleproduct', $latestproduct->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            </form>
                                        </div>
                                    @endif

                                    <div class="seemore_bt w-25"><a href="{{ route('product', $latestproduct->slug) }}">See
                                            More</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="fashion_taital">Categories</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @php
                        $categories = App\Models\Category::latest('id')
                            ->limit(6)
                            ->get();
                    @endphp
                    @foreach ($categories as $category)
                        @php
                            $product = App\Models\Product::where('category_name', $category->category_name)
                                ->limit(1)
                                ->first();
                        @endphp
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $category->category_name }}</h4>

                                <div class="tshirt_img">
                                    <a href="{{ route('category', $category->slug) }}">
                                        <img src="{{ asset("upload/products/$product->photo") }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    @php
        $categories = App\Models\Category::latest('id')->get();
    @endphp
        <div class="container">
            @foreach ($categories as $category)
                <h1 class="fashion_taital">{{ $category->category_name }}</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @php
                            $products = App\Models\Product::where('category_name', $category->category_name)->get();
                        @endphp
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                    <p class="price_text">Price <span style="color: #262626;">$
                                            {{ $product->price }}</span></p>
                                    <div class="tshirt_img">
                                        <img src="{{ asset("upload/products/$product->photo") }}">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        @if ($product->quantity == 0)
                                            <button class="mr-2"
                                                style="outline:none;background:none;font-size:15px;color:#e90000">Out of
                                                Stock</button>
                                        @elseif ($product->quantity <= 3)
                                            <button class="mr-2"
                                                style="outline:none;background:none;font-size:15px;color:#e78b00">Low
                                                Stock</button>
                                        @else
                                            <div>
                                                <form action="{{ route('addproducttocart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="mr-2"
                                                        style="outline:none;background:none;font-size:15px;color:#e78b00">Buy
                                                        Now</button>
                                                    <a href="{{ route('addtocartsingleproduct', $product->id) }}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                </form>
                                            </div>
                                        @endif

                                        <div class="seemore_bt w-25"><a href="{{ route('product', $product->slug) }}">See
                                                More</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
@endsection
