@extends('layouts.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
@include('sweet::alert')
    <!-- HOME -->
	<div id="home" >
		<!-- container -->
		<div class="container">
                        <div class="owl-main owl-carousel owl-theme">
              
                            @foreach ($slider as $item)
                            <div class="item">
                                <a href="{{ route('list', [$item->categoryId]) }}"><img src="{{ asset( 'uploads/sliders/'.$item->sliderImage ) }}" alt=""></a>
                              
                              </div>
                            @endforeach
                            </div>
          

			<!-- /home wrap -->
		</div>
    <!-- /container -->
    
  </div>
  
  
	<!-- /HOME -->
    <!-- section -->
	<div class="section wow fadeIn" data-wow-delay="0.22s">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                <!-- banner -->
				
												                <!-- banner -->
				<div class="col-md-2 col-sm-6 banner-small-red">
					
						<!-- <img src="./img/banner10.jpg" alt=""> -->
						<div class="banner-caption-2">
						<h2 class="banner-color"><a href="/list/3">Biscuits</a></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
												                <!-- banner -->
				<div class="col-md-2 col-sm-6 banner-small-yel">
					
						<!-- <img src="./img/banner10.jpg" alt=""> -->
						<div class="banner-caption-2">
						<h2 class="banner-color"><a href="/list/1">Pickles &amp; Chutney</a></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
												                <!-- banner -->
				<div class="col-md-2 col-sm-6 banner-small">
					
						<!-- <img src="./img/banner10.jpg" alt=""> -->
						<div class="banner-caption-2">
						<h2 class="banner-color"><a href="/list/2">Vegetables &amp; Fruits</a></h2>
						</div>
					</a>
				</div>
				<!-- /banner -->
								
				
                

                
                

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    <!-- section -->
	<div class="section wow fadeIn" data-wow-delay="0.2s">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
                        
                        <h2 class="title">My Smart Basket</h2>
                    
					</div>
				</div>
				<!-- /section-title -->

				<!-- Product Slick -->
				<div class="col-md-12 col-sm-6 col-xs-6 pb-4">
					<div class="row main-content">

                        <div class="owl-product owl-carousel owl-theme">
                                                        
                                    
                           

                                                            
                                @foreach ($product as $item)
                                <div class="item">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">

                                                                                            <span class="sale"> Get {{$item->discountPercent}} off</span>
                                                
                                            </div>
                                            
                                            <a href="/details/detail/{{$item->slug}}"><img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt=""></a>
                                        </div>
                                        <div class="product-body">
                                        <h3 class="product-price">Rs. {{$item->rate}}
                                                                                    <del class="product-old-price">Rs. 450</del>
                                                                                    
                                        </h3>
                                            
                                        <h2 class="product-name"><a href="/details/detail/{{$item->slug}}">{{$item->productName}}</a></h2>
                                            <div class=" product-btns">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <button class="main-btn icon-btn add-to-wishlist" data-product="22"><i class="fa fa-heart"></i></button> 
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form action="/add_to_cart" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="1" name="quantity">      
                                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                                            <button class="btn btn-success" title="Add to cart" data-productid="22" data-product="KiTCHEN RECiPE Akabare in Vinegar" data-rate="400"><i class="fa fa-shopping-cart"></i>Add</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                                        

                             </div>
					</div>
				</div>
                <!-- /Product Slick -->

			</div>

		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
    <div class="section">
    <div class="container">
        <div class="row main-content" style="">
            <div class="carousel-wrap">
                <div class="owl-second owl-carousel owl-theme">
                      @foreach ($slider as $item)
                      <div class="item">
                        <img src="{{ asset( 'uploads/sliders/'.$item->sliderImage ) }}" alt="">
                        </div>
                      @endforeach
                    {{-- <div class="item">
                      <img src="http://encoderslab.com/iPasal/themes/8/img/pre_measures.jpg" />
                      
                    </div> --}}
                   
                    
                </div>
              </div>
            </div>
        </div>
    </div>
    


    <div class="section wow fadeIn" data-wow-delay="0.2s">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Bank Offers</h2>
                </div>
            </div>

            <div class="col-md-3 col-ms-12 bank_cards">
            <img src="http://encoderslab.com/iPasal/themes/8/img/paytm.jpg" height="240" width="100%" alt="">
            </div>

            <div class="col-md-3 col-ms-12 bank_cards">
                <img src="http://encoderslab.com/iPasal/themes/8/img/icici.jpg"  height="240" width="100%" alt="">
                </div>

            <div class="col-md-3 col-ms-12 bank_cards">
                <img src="http://encoderslab.com/iPasal/themes/8/img/SCB.jpg"  height="240" width="100%" alt="">
            </div>

            <div class="col-md-3 col-ms-12 bank_cards">
                <img src="http://encoderslab.com/iPasal/themes/8/img/indus_bank.jpg"  height="240" width="100%" alt="">
            </div>
        </div>
    </div>
</div>

    <!-- section -->
<div class="section wow fadeIn" data-wow-delay="0.2s">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title ">
                    
                        <h2 class="title">Products</h2>
                </div>
            </div>
            <!-- /section-title -->

            <!-- Product Slick -->
            <div class="col-md-12 col-sm-6 col-xs-6 pb-4">
                <div class="row main-content">

                    <div class="owl-product owl-carousel owl-theme">


                                                                                    
                        @foreach ($products as $item)
                        <div class="item">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">

                                                                                    <span class="sale"> Get {{$item->discountPercent}} off</span>
                                        
                                    </div>
                                    
                                    <a href="/details/detail/{{$item->slug}}"><img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt=""></a>
                                </div>
                                <div class="product-body">
                                <h3 class="product-price">Rs. {{$item->rate}}
                                                                            <del class="product-old-price">Rs. 450</del>
                                                                            
                                </h3>
                                    
                                <h2 class="product-name"><a href="/details/detail/{{$item->slug}}">{{$item->productName}}</a></h2>
                                    <div class="product-btns">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button class="main-btn icon-btn add-to-wishlist" data-product="22"><i class="fa fa-heart"></i></button> 
                                            </div>
                                            <div class="col-sm-6">
                                                <form action="/add_to_cart" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="1" name="quantity">      
                                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                                    <button id="add" class="btn btn-success" title="Add to cart" data-productid="22" data-product="KiTCHEN RECiPE Akabare in Vinegar" data-rate="400"><i class="fa fa-shopping-cart"></i>Add</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                         </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->
</div>
<!-- /section -->
<script>
    $('#add').on('click',function(){
        Swal.fire(
                'The Internet?',
                'That thing is still around?',
                'question'
)
    })
</script>
@endsection
