@php
    use App\Http\Controllers\FrontController;
    $total = 0;
    if(Session::has('user')){
        $total = FrontController::cartItem();
    }

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="csrf-token" content="TktR16QApspOovB2X2qzk1VHvRnnEo20C8NRF48P">

<title>iPasal | Shop Products, E-commerce site </title>

	<!-- Google font -->
	<link href="/css/googlefont.css" rel="stylesheet">

<!-- Bootstrap -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="/css/slick.css">
	<link type="text/css" rel="stylesheet" href="/css/slick-theme.css">

	<!-- nouislider -->
	{{-- <link type="text/css" rel="stylesheet" href="/css/nouislider.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Font Awesome Icon -->
	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/font-awesome.min.css"> --}}
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/css/style_new.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


</head>

<body>

        <!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span></span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
					    <li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
                        @if(Session::has('user'))  
                        <li class="dropdown" >
                            <a id="login" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >{{Session::get('user')['name']}}
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="login">
                            <li><a href="{{route('logout')}}">Logout</a></li>
                            </ul>
                          </li>
                          @else
                            <li><a href="{{route('login')}}">Login</a></li>  
                          @endif
						<li><a href="http://localhost:8000/register">Signup</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pull-left" style="display: flex;">
                            <!-- Logo -->
                            <div class="header-logo">
                            <a class="logo" href="{{route('layouts.app')}}">
                                    <img src="http://encoderslab.com/iPasal/themes/8/img/logo.png" alt="iPasal">
                                </a>
                            </div>
                            <!-- /Logo -->
        
                            <!-- Search -->
                            <div class="header-search">
                                <form action="/search" class="header_search_form clearfix">
                                    @csrf
                                    <input type="text" name="query" class="input search-input" placeholder="Search For Products" required="required">
                                    
                                    <button class="search-btn" type="submit" value="Search"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- /Search -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pull-right" style="float: right">
                            <ul class="header-btns">
                                <!-- Account -->
                                <li class="header-account dropdown default-dropdown">
                                    <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                        <div class="header-btns-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        
                                    </div>
                                    <ul class="custom-menu">
                                        <li><a href="http://encoderslab.com/iPasal/theme8/show-checkout"><i class="fa fa-check"></i> Checkout</a></li>
                                        <li><a href="http://encoderslab.com/iPasal/theme8/login"><i class="fa fa-unlock-alt"></i> Login</a></li>
                                    </ul>
                                </li>
                                <!-- /Account -->
        
                                <!-- Cart -->
                                <li class="header-cart dropdown default-dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <div class="header-btns-icon">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="qty"><span class="total-count"></span>{{$total}}</span>
                                        </div>
                                        <strong class="text-uppercase"> My Cart:</strong>
                                        <a href="/cartList">view</a>

                                        <br>
                                        <span class="cart-count"></span>
                                    </a>

                                    {{-- <div class="custom-menu">
                                        <div id="shopping-cart">
        
                                            <div class="shopping-cart-list">
                                                <div class="product product-widget">
                                                    <div class="product-thumb">
                                                        <img src="http://encoderslab.com/iPasal/uploads/products/thumbnails/featured-kitchen-recipe-akabare-in-vinegar-5EaIOTHk.jpg" alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-price">NRs. 400 <span class="qty"></span></h3>
                                                        <h2 class="product-name"><a href="#">KiTCHEN RECiPE Akabare in Vinegar</a></h2>
                                                    </div>
                                                    <button class="cancel-btn">
                                                        <form id="remove-item-564dd0ab34b63878ca2237c47a620cf2" action="http://encoderslab.com/iPasal/cart/564dd0ab34b63878ca2237c47a620cf2" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_token" value="TktR16QApspOovB2X2qzk1VHvRnnEo20C8NRF48P">
                                                            <input type="hidden" name="_method" value="delete">
                                                    <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <div class="shopping-cart-btns">
                                            <button class="main-btn"><a href="http://encoderslab.com/iPasal/theme8/show-cart">View Cart</a></button>
                                                <button class="primary-btn"><a href="http://encoderslab.com/iPasal/theme8/show-checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a></button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </li>
                                <!-- /Cart -->
        
                                <!-- Mobile nav toggle-->
                                <li class="nav-toggle">
                                    <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                                </li>
                                <!-- / Mobile nav toggle -->
                            </ul>
                        </div>
                    </div>
                </div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
    
    	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				
				    <div class="category-nav show-on-click">
    <span class="category-header ">SHOP BY CATEGORY <i class="fa fa-list"></i></span>
    <ul class="category-list">
        
        
        			@foreach ($category as $item)
                    <li><a href="{{ route('list', [$item->id]) }}">{{$item->name}}</a></li>
                    @endforeach
		
    </ul>
</div>				<!-- /category nav -->

				<!-- menu nav -->

				    <div class="menu-nav">
    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
    <ul class="menu-list">
    <li><a href="{{route('layouts.app')}}">Home</a></li>
    <li><a href="{{route('policy')}}">Privacy Policy</a></li>
        <li><a href="#">Contact Us</a></li>
       
    </ul>
</div>				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->