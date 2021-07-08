<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RoyalDharan.com  | Online Distributors</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('themes/11/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/11/css/style.css') }}" type="text/css">

    @yield('styles')
    <style>
      .black, .black:hover{
        color: #212529;
      }
      .black:hover{
        color: black;
        font-weight: 550
      }
      .border{
        border: 1px solid grey;
      }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @yield('head')

    @yield('hero_main')

    @yield('hero')

    @yield('slider')

    @yield('featured_product')

    @yield('banner')

    @yield('threesection')

    @yield('content')

    @yield('login_modals')

    @yield('insert_modals')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        {{-- <div class="footer__about__logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('image/new.png') }}" width="135" alt=""></a>
                        </div> --}}
                        <ul>
                            <li>Address: Dharan, Sunsari (Nepal)</li>
                            <li>Phone: 9804075821, 9804356098, 9842060001</li>
                            <li>Email: royaldharanonline@gmail.com</li>
                        </ul>

                        <img src="{{ asset('themes/11/img/esewa-footer.png') }}" alt="" width="70" height="60" style="object-fit: contain;">
                        <img src="{{ asset('themes/11/img/khalti-footer.jpg') }}" alt="" width="70" height="60" style="object-fit: contain;">
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            {{-- <li><a href="#">About Our Shop</a></li> --}}
                            {{-- <li><a href="#">Secure Shopping</a></li> --}}
                            {{-- <li><a href="#">Delivery infomation</a></li> --}}
                            <li><a href="#">Privacy Policy</a></li>
                            {{-- <li><a href="#">Our Sitemap</a></li> --}}
                        </ul>
                        <ul>
                            {{-- <li><a href="#">Who We Are</a></li> --}}
                            {{-- <li><a href="#">Our Services</a></li> --}}
                            {{-- <li><a href="#">Projects</a></li> --}}
                            {{-- <li><a href="#">Contact</a></li> --}}
                            {{-- <li><a href="#">Innovation</a></li> --}}
                            {{-- <li><a href="#">Testimonials</a></li> --}}
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            {{-- <a href="https://www.facebook.com/aryalenterprisesgaindakot"><i class="fa fa-facebook"></i></a> --}}
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <p class="footer-copyright">
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="http://encoderslab.com" target="_blank">Encoderslab.com</a>
                  </p>
                {{-- <div class="col-lg-12">
                  
                  <div class="footer__copyright">
                      <div class="footer__copyright__text"><p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://encoderslab.com" target="_blank">Encoderslab.com</a>
</p></div>
                      <div class="footer__copyright__payment">
                        <img src="{{ asset('themes/11/img/esewa-footer.png') }}" alt="" width="70" height="60" style="object-fit: contain;">
                        <img src="{{ asset('themes/11/img/khalti-footer.jpg') }}" alt="" width="70" height="60" style="object-fit: contain;">
                      </div>
                  </div>
              </div> --}}



            </div>
            {{-- <div class="row">
                
            </div> --}}
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    
    

    <script src="{{ asset('themes/11/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('themes/11/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/11/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('themes/11/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('themes/11/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('themes/11/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('themes/11/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/11/js/main.js') }}"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    
    <script>
      //   @if (Session::has('success'))
      //     toastr.success('{{ Session::get("success") }}');
      // @endif
      // @if (Session::has('info'))
      //     toastr.info('{{ Session::get("info") }}');
      // @endif

		$(document).ready(function(){
      $('.show-modal').click(function(e){
        e.preventDefault();
        var id =$(this).data("cat");
        // alert(id);

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

			$('.show-offer-modal').click(function(e){
				e.preventDefault();
				$('#offer_modal').modal('show');
			});

            $('.show-category-modal').click(function(e){
				e.preventDefault();
				$('#category_modal').modal('show');
			});

            // login modal
	        $('.show-login').click(function(e){
				e.preventDefault();
				$('#login_modal').modal('show');
			});

            $('.show-register').click(function(e){
				e.preventDefault();
				$('#register_modal').modal('show');
			});

            // Add to Cart 
			$('.add-to-cart').click(function(e){
				e.preventDefault();
				// alert('clicked');
				let productId = $(this).data('productid');
				let productName = $(this).data('product');
				let rate = $(this).data('rate');
        // let shipping = $(this).data('shipping');
        
        var data = {};
        let type = $(this).data('type');
        if ( type == 1 ) {
          let count = $('.cartNo').val();
          data = { productId, productName, rate, count };
        }else{
          data = { productId, productName, rate };
        }
        
				// alert(rate);
				$.ajaxSetup({
				  headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  }
				});

				$.ajax({
	               type:'POST',
	               url:'{{ secure_url("cart/ajax") }}',
	               data: data,
	               success:function(data) {
	               		if ( data.status == 200 ) {
	               			
	               			let count = $('.total-count').text();
	               			let cartcount = parseInt(count) + 1;
	               			$('.total-count').text(cartcount);
	               			$('.cart-count').text(cartcount + ' Item(s)');

	               			Swal.fire({
        							  title: 'Success!',
        							  text: 'Item added to your cart.',
        							  icon: 'success',
        							  confirmButtonText: 'Ok'
        							})

	               		}else{
							
	               			Swal.fire({
        							  text: 'Item already on your cart. Visit your cart to view selected items.',
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
					url:'{{ secure_url("wishlist/ajax") }}',
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
              
              $(':input[type="submit"]').prop('disabled', false);
              $(".slider-error").empty();
            }else{
              
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

      // validation for product image
			$("#category_file").change(function (e) {
				var file, img;
				if ((file = this.files[0])) {
					img = new Image();
					var objectUrl = _URL.createObjectURL(file);
					img.onload = function () {
						// alert(this.width + " " + this.height);
            if(this.width >= 270 || this.height >= 270){
              // alert('success');
              $(':input[type="submit"]').prop('disabled', false);
              $(".category-error").empty();
            }else{
              // alert('Failure');
              $(".category-error").text("Image Size Too Small. Please Upload Larger Image.");
              $(':input[type="submit"]').prop('disabled', true);
            }
						_URL.revokeObjectURL(objectUrl);
					};
					img.src = objectUrl;
				}
			});

      $('.submit-form').change(function(){
                $(this).submit();
        });


        });
    </script>

    @yield('scripts')
</body>

</html>