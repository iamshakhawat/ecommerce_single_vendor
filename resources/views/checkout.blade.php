@php
    $categories = App\Models\Category::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('frontend/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->

    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- banner bg main start -->
    <div class="banner_bg_main"
        @if (url()->current() == url('/')) style="background-image: url({{ asset('frontend/images/banner-bg.png') }});" @else
        style="background-image: url({{ asset('frontend/images/banner-bg.jpg') }});" @endif>
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="#">Best Sellers</a></li>
                                <li><a href="#">Gift Ideas</a></li>
                                <li><a href="#">New Releases</a></li>
                                <li><a href="#">Today's Deals</a></li>
                                <li><a href="#">Customer Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('frontend/images/logo.png') }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- logo section end -->
        <!-- header section start -->
        <div class="header_section mb-5">
            <div class="container">
                <div class="containt_main">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="{{ route('homepage') }}">Home</a>
                        @foreach ($categories as $category)
                            <a href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a>
                        @endforeach
                    </div>
                    <span class="toggle_icon" onclick="openNav()"><img
                            src="{{ asset('frontend/images/toggle-icon.png') }}"></span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($categories as $category)
                                <a class="dropdown-item"
                                    href="{{ route('category', $category->slug) }}">{{ $category->category_name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <form action="{{ route('search') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search any product"
                                    @isset($search)
                                    value="{{ $search }}"
                                @endisset>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit"
                                        style="background-color: #f26522; border-color:#f26522 ">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="header_box">
                        <div class="lang_box ">
                            <a href="#" title="Language" class="nav-link" data-toggle="dropdown"
                                aria-expanded="true">
                                <img src="{{ asset('frontend/images/flag-uk.png') }}" alt="flag" class="mr-2 "
                                    title="United Kingdom"> English
                                <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <a href="#" class="dropdown-item">
                                    <img src="{{ asset('frontend/images/flag-france.png') }}" class="mr-2"
                                        alt="">
                                    French
                                </a>
                            </div>
                        </div>
                        <div class="login_menu">
                            <ul>
                                @auth
                                    <li><a href="{{ route('cart') }}">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            <span class="padding_10">Cart</span></a>
                                    </li>
                                    <li><a href="{{ route('userprofile') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="padding_10">My Account</span></a>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="padding_10">Login</span></a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section end -->

        <div class="container">
            <h2 class="text-center">Checkout</h2>
            <div class="row p-5 mb-5">
                <div class="col-md-4 p-2 ">
                    <div class="box_main">
                        <style>
                            table {
                                width: 100%;
                            }

                            td {
                                padding: 5px;
                                margin-left: 15px;
                            }
                        </style>
                        <div class="d-flex justify-content-between">
                            <h3>Shipping Details:</h3>
                            <a href="{{ route('addressbook') }}" style="text-decoration: underline !important">Edit</a>
                        </div>
                        <table border="1">
                            <tr>
                                <td>Name:</td>
                                <td>{{ $address[0]->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>{{ $address[0]->phone }}</td>
                            </tr>
                            <tr>
                                <td>District:</td>
                                <td>{{ $address[0]->district }}</td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td>{{ $address[0]->city }}</td>
                            </tr>
                            <tr>
                                <td>Area:</td>
                                <td>{{ $address[0]->area }}</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>{{ $address[0]->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 p-2 ">
                    <div class="box_main">
                        <h4>Your Products:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
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
                                        <img style="height: 50px"
                                            src="{{ asset("upload/products/$product->photo") }}"
                                            alt="{{ $product->product_name }}">
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>$ {{ $cart->price }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total</td>
                                <td> {{ $totalproduct }}</td>
                                <td> ${{ $price }}</td>
                            </tr>
                        </table>


                        <div class=" d-flex justify-content-between">
                            <div class="cashondelivery">
                                <h3>Payment Method:</h3>
                                <p class="m-0 p-0" for="payment_method" style="vertical-align: middle"><input
                                        style="vertical-align: middle" type="radio" name="payment_method" checked
                                        id=""> Cash on Delivery</p>
                            </div>
                            <div class="col-md-5">
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0 p-0">Total Price:</p>
                                        <p class="m-0 p-0">$ {{ $price }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0 p-0">Total Discount:</p>
                                        <p class="m-0 p-0"> $ 0.00</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0 p-0">Shipping Charge:</p>
                                        <p class="m-0 p-0"> $ 50 .00</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0 p-0">Delivery Charge:</p>
                                        <p class="m-0 p-0"> $ 50 .00</p>
                                    </div>
                                    <hr class="mt-1 mb-1">
                                    <div class="d-flex justify-content-between">
                                        <p class="m-0 p-0">Total:</p>
                                        <p class="m-0 p-0">$ {{ $price+100 }}</p>
                                    </div>
                                    <a href="{{ route('placeorder') }}" class="mt-4 btn btn-warning rounded-0 form-control">Place Order</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- footer section start -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="footer_logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/images/footer-logo.png') }}"></a>
                </div>
                <div class="input_bt">
                    <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
                    <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
                </div>
                <div class="footer_menu">
                    <ul>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Gift Ideas</a></li>
                        <li><a href="#">New Releases</a></li>
                        <li><a href="#">Today's Deals</a></li>
                        <li><a href="#">Customer Service</a></li>
                    </ul>
                </div>
                <div class="location_main">Help Line Number : <a href="#">+1 1800 1200 1200</a></div>
            </div>
        </div>
        <!-- footer section end -->
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free
                        html
                        Templates</a></p>
            </div>
        </div>
        <!-- copyright section end -->
        <!-- Javascript files-->
        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery-3.0.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugin.js') }}"></script>
        <!-- sidebar -->
        <script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('frontend/js/custom.js') }}"></script>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>

        <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
        @if (Session::has('icon') && Session::has('msg'))
            <script>
                toastr["{{ Session::get('icon') }}"]("{{ Session::get('msg') }}");
            </script>
        @endif
</body>

</html>
