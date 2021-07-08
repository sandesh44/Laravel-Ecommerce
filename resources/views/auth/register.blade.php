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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="/css/slick.css">
	<link type="text/css" rel="stylesheet" href="/css/slick-theme.css">

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="/css/nouislider.min.css">

	<!-- Font Awesome Icon -->
	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/font-awesome.min.css"> --}}
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/css/style_new.css">
	
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    

    


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
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
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
                            <a class="logo" href="http://encoderslab.com/iPasal/theme8">
                                    <img src="http://encoderslab.com/iPasal/themes/8/img/logo.png" alt="iPasal">
                                </a>
                            </div>
                            <!-- /Logo -->
        
                            <!-- Search -->
                            <div class="header-search">
                                <form action="/search" method="GET" class="header_search_form clearfix">
                                    @csrf
                                    <input type="hidden" name="_token" value="TktR16QApspOovB2X2qzk1VHvRnnEo20C8NRF48P">
                                    <input type="text" name="search" class="input search-input" placeholder="Search For Products" required="required">
                                    
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
                                            <span class="qty"><span class="total-count"></span></span>
                                        </div>
                                        <strong class="text-uppercase"> My Cart:</strong>
                                        {{-- <a href="/cartList">view</a> --}}

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
        
        
        			{{-- @foreach ($category as $item)
                    <li><a href="{{ route('list', [$item->id]) }}">{{$item->name}}</a></li>
                    @endforeach --}}
		
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class=" col-xl-3">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="#">
                <img src="./img/logo.png" alt="">
              </a>
                    </div>
                    <!-- /footer logo -->

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class=" col-xl-3">
                <div class="footer">
                    <h3 class="footer-header">My Account</h3>
                    <ul class="list-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Compare</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            {{-- <div class="clearfix visible-sm visible-xs"></div> --}}

            <!-- footer widget -->
            <div class="col-xl-3">
                <div class="footer">
                    <h3 class="footer-header">Customer Service</h3>
                    <ul class="list-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Shiping & Return</a></li>
                        <li><a href="#">Shiping Guide</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class=" col-xl-3">
                <div class="footer">
                    <h3 class="footer-header">Stay Connected</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    <form>
                        <div class="form-group">
                            <input class="input" placeholder="Enter Email Address">
                        </div>
                        <button class="primary-btn">Join Newslatter</button>
                    </form>
                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->






 <!-- jQuery Plugins -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zoom.js/0.0.1/zoom.min.js"></script>
<script src="/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>




<script>
    $(document).ready(function(){
        $('.show-modal').click(function(e){
            e.preventDefault();
            $('#featured_modal').modal('show');
        });

        $('.show-modal_2').click(function(e){
            e.preventDefault();
            $('#product_modal').modal('show');
        });

        $('.show-slider').click(function(e){
            e.preventDefault();
            $('#slider_modal').modal('show');
        });
        
        // Add to Cart 
        $('.add-to-cart').click(function(e){
            e.preventDefault();
            // alert('clicked');
            let productId = $(this).data('productid');
            let productName = $(this).data('product');
            let rate = $(this).data('rate');

            // alert(rate);
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
               type:'POST',
               url:'http://encoderslab.com/iPasal/cart/ajax',
               data: { productId, productName, rate },
               success:function(data) {
                       if ( data.status == 200 ) {
                           
                           let count = $('.total-count').text();
                           let cartcount = parseInt(count) + 1;
                           $('.total-count').text(cartcount);
                           $('.cart-count').text(cartcount + ' Item(s)');
                        console.log('cart updated');

                           Swal.fire({
                          title: 'Success!',
                          text: 'Item added to your cart.',
                          icon: 'success',
                          confirmButtonText: 'Ok'
                        })

                       }else{
                        console.log('something is wrong');
                           Swal.fire({
                          text: 'Item already on your cart.',
                          icon: 'error',
                          confirmButtonText: 'Exit'
                        })
                       }
               }
            });

        });

        // Add to Wish List
        $('.add-to-wishlist').click(function(e){
            e.preventDefault();

            let productId = $(this).data('product');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                type:'POST',
                url:'http://encoderslab.com/iPasal/wishlist/ajax',
                data: { productId },
                success:function(data) {
                    
                    if ( data.status == 200 ) {
                        let count = $('.total-count-wish').text();
                           let cartcount = parseInt(count) + 1;
                           $('.total-count-wish').text(cartcount);

                           Swal.fire({
                          title: 'Success!',
                          text: data.message,
                          icon: 'success',
                          confirmButtonText: 'Ok'
                        })

                       }else{
                           
                           Swal.fire({
                          text: 'Please login to add this item in the wish list.',
                          icon: 'error',
                          confirmButtonText: 'Exit'
                        })
                       }

                }
            });

        });

        // Sort Product
        $('.sort-product').change(function(){

            window.location = `?sort=` + $(this).val();

        });

        // validation for slider image
        var _URL = window.URL || window.webkitURL;
        $("#file_slider").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    // alert(this.width + " " + this.height);
        if(this.width >= 520 || this.height >= 460){
          // alert('success');
          $(':input[type="submit"]').prop('disabled', false);
          $(".slider-error").empty();
        }else{
          // alert('Failure');
          $(".slider-error").text("Image Size Too Small. Please Upload Larger Image.");
          $(':input[type="submit"]').prop('disabled', true);
        }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        });

        // validation for featured image
        $("#featured_file").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    // alert(this.width + " " + this.height);
        if(this.width >= 520 || this.height >= 460){
          // alert('success');
          $(':input[type="submit"]').prop('disabled', false);
          $(".featured-error").empty();
        }else{
          // alert('Failure');
          $(".featured-error").text("Image Size Too Small. Please Upload Larger Image.");
          $(':input[type="submit"]').prop('disabled', true);
        }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        });

        // validation for product image
        $("#product_file").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    // alert(this.width + " " + this.height);
        if(this.width >= 520 || this.height >= 460){
          // alert('success');
          $(':input[type="submit"]').prop('disabled', false);
          $(".product-error").empty();
        }else{
          // alert('Failure');
          $(".product-error").text("Image Size Too Small. Please Upload Larger Image.");
          $(':input[type="submit"]').prop('disabled', true);
        }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        });



    });
</script>

<script>
    // init wow js
    new WOW().init();


    $( document ).ready(function() {
   var owl = $('.owl-main');
owl.owlCarousel({
   items:5,
   loop:true,
   margin:10,
   // autoplayDelay: 6000,
   autoplay:true,
   autoplayTimeout:4000,
   autoplayHoverPause:true,
   nav: true,
//    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
   dots: true,	
   responsive: {
   0: {
     items: 1
   },

   600: {
     items: 3
   },

   1024: {
     items: 5
   },

   1366: {
     items: 1
   }
 }
});

var owl_pro = $('.owl-product');
owl_pro.owlCarousel({
   items:5,
   loop:true,
   margin:10,
   // autoplayDelay: 6000,
   autoplay:false,
   autoplayTimeout:5000,
   autoplayHoverPause:true,
   nav: true,
//    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
   dots: false,	
   responsive: {
   0: {
     items: 1
   },

   600: {
     items: 3
   },

   1024: {
     items: 5
   },

   1366: {
     items: 5
   }
 }
});


var owl_sec = $('.owl-second');
owl_sec.owlCarousel({
   items:5,
   loop:true,
   margin:10,
   // autoplayDelay: 6000,
   autoplay:true,
   autoplayTimeout:4000,
   autoplayHoverPause:true,
   nav: true,
//    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
   dots: false,	
   responsive: {
   0: {
     items: 1
   },

   600: {
     items: 1
   },

   1024: {
     items: 1
   },

   1366: {
     items: 1
   }
 }
});

});
</script>


</body>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

</html>
