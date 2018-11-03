<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Construction is ultimate responsive construction html template which include 3 homepage demos.">
    <title>News24 - Responsive News Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- themify Icon CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/themify-icons.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/animate.min.css">
    <!-- Elegant Icons CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/elegant-line-icons.css">
    <!-- Bootsrtap CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/bootstrap.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/owl.carousel.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/meanmenu.css">
    <!-- Swipebox CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/swipebox.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('endUser') }}/css/responsive.css">
    <script src="{{ asset('endUser') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    @section('head')
    @show
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id='preloader' >
    <div class='loader' >
        <img src="{{ asset('endUser') }}/img/loading.gif" width="200" alt="">
    </div>
</div><!-- Preloader -->

<header id="header" class="header sticky-header">

    <div class="top-header bg-dark">
        <div class="container">
            <div class="col-md-6">
                <ul class="top-info">
                    <li><i class="ti-mobile"></i> {{$link->phone}}</li>
                    <li><a href="mailto:mail@domain.com"><i class="ti-email"></i> {{$link->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-6 text-right sm-text-left">
                <ul class="top-social">
                    <li><a href="{{$link->facebook}}"><i class="ti-facebook"></i></a></li>
                    <li><a href="{{$link->twitter}}"><i class="ti-twitter"></i></a></li>
                    <li><a href="{{$link->google}}"><i class="ti-google"></i></a></li>
                    <li><a href="{{$link->linkedin}}"><i class="ti-linkedin"></i></a></li>
                    <li><a href="{{$link->youtube}}"><i class="ti-youtube"></i></a></li>
                    <li class="fz-13">{{ \Carbon\Carbon::now()->toDayDateTimeString() }}</li>
                </ul>
            </div>
        </div>
    </div><!-- /.top-header -->

    <div class="mid-header">
        <div class="container">
            <div class="site-branding full-left">
                <a href="#"><img src="{{ asset('storage') }}/{{ $appearance->logo }}" alt="News24"></a>
            </div><!-- /.site-branding -->
            <div class="banner pull-right">
                <a href="#"><img src="{{ asset('storage') }}/{{ $appearance->banner_header }}" alt="News24 Banner"></a>
            </div><!-- /.banner -->
        </div>
    </div><!-- /.mid-header -->

    <div class="mainmenu-wrap bg-red">
        <div class="container">
            <div class="col-md-9 col-xs-6">
                <div class="menu-wrap mean-menu">
                    <nav class="mainmenu">
                        <ul id="navi-menu">
                            <li class="current_page_item"><a href="index.html">Home</a></li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ url('/category', $category->id) }}/{{$category->name}}">
                                        {{ $category->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <form action="#" class="search-form">
                    <input type="text" placeholder="Search news..">
                    <button class="submit" type="submit"><i class="ti-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu"></div>
        </div>
    </div><!-- /.mainmenu-wrap -->
</header><!-- /.header -->

