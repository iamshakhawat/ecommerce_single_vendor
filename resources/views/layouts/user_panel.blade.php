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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
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
                                <li><a href="{{ route('homepage') }}">Home</a></li>
                                @auth
                                <li><a href="{{ route('cart') }}">Cart</a></li>
                                <li><a href="{{ route('dashbaord') }}">My Account</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endauth
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
                            <a href="{{ route('homepage') }}">
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
            <div class="row p-5 my-5">
                <div class="col-md-2 box_main">
                    <ul>
                        <li><a href="{{ route('userdashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('cart') }}">Cart</a></li>
                        <li><a href="{{ route('orderpending') }}">Pending Orders</a></li>
                        <li><a href="{{ route('addressbook') }}">Address Book</a></li>
                        <li><a href="{{ route('orderhistory') }}">History</a></li>
                        <li><a href="{{ route('userprofile') }}">Profile</a></li>
                        <li><a href="{{ route('changepassword') }}">Change Password</a></li>
                        <li><a href="{{ route('userlogout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-10 ">
                    <div class="box_main">
                        @yield('content')
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
                <p class="copyright_text">© 2020 All Rights Reserved. </p>
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


