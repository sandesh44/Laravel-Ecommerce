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





<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 <!-- jQuery Plugins -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zoom.js/0.0.1/zoom.min.js"></script>
<script src="/js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
@include('sweet::alert')




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
<script>
    var  slider = document.getElementById('price-slider');
    noUiSlider.create(slider,{
          start:[1,1000],
          connect:true,
          range:{
              'min': 1,
              'max': 1000
          },
          pips:{
              mode: 'steps',
              stepped:true,
              density:4
          }

    });
</script>


</body>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

</html>