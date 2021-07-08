@extends('theme11.layouts.main')

@section('head')
    @include('theme11.layouts.head')
@endsection

@section('hero')
    @include('theme11.layouts.hero')
@endsection

@section('styles')

<style>
    .product__details__tab__desc ul{
        list-style-type: none;
    }
    .product__details__tab__desc .icon{
        color: #7fad39;
    }
    .hero{
        padding-bottom: unset !important;
    }
    .product__details__tab__desc .review{
        border:1px solid #ccc;padding:15px;margin-bottom: 10px;
    }
    .product__details__tab__desc .review a{
        color: black;
        margin-left: 10px;
    }
    .product__details__tab__desc .orange{
        color: orange;
    }
    .product__details__tab__desc .rate{
        font-size: 13px;
        letter-spacing: -1px;
    }
    .pl-20{
        padding-left: 20px;
    }
    .m-0{
        margin-left: 0px;
        margin-right: 0px;
    }
</style>

@endsection

@section('content')
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" data-setbg="{{ secure_asset('themes/11/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                <h2>{{ strtoupper($product->productName) }}</h2>
                    <div class="breadcrumb__option">
                    <a href="{{ url('/') }}">Home</a>
                    <span>{{ $product->category->name }}s</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{  secure_asset('uploads/products/'.$product->featuredImage) }}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{  secure_asset('uploads/products/'.$product->featuredImage) }}" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg"
                            src="img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg"
                            src="img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg"
                            src="img/product/details/thumb-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                <h3>{{ $product->productName }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star {{ $averageRating >= 1 ? 'orange' : '' }}"></i>
                        <i class="fa fa-star {{ $averageRating >= 2 ? 'orange' : '' }}"></i>
                        <i class="fa fa-star {{ $averageRating >= 3 ? 'orange' : '' }}"></i>
                        <i class="fa fa-star {{ $averageRating >= 4 ? 'orange' : '' }}"></i>
                        <i class="fa fa-star {{ $averageRating >= 5 ? 'orange' : '' }}"></i>
                        <span>{{ $product->reviews()->count() }} review(s)</span>
                    </div>
                <div class="product__details__price">NRS. {{ $product->rate }}
                    @if($product->rate == $product->actualRate)

                    @else
                        <del class="product-old-price" style="color: #7a7777;">( Rs. {{ $product->actualRate }} )</del>
                    @endif
                </div>
                    <p>{{ $product->shortDesc }}</p>
                    <div class="product__details__quantityq">
                        <div class="quantityq">
                            {{-- <div class="pro-qty"> --}}


                                {{-- <form action="{{ route('cart.update', $item->rowId) }}" method="post" class="submit-form" > --}}
                                        {{-- {{csrf_field()}} --}}
                                        {{-- {{ method_field('PUT') }} --}}
                                        {{-- <select name="item_count" class="form-control" style=""> --}}
                                            <?php //for ($i=1; $i <= 10; $i++) { ?>
                                                {{-- <option value="{{$i}}" {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option> --}}
                                            <?php //} ?>
                                        {{-- </select> --}}
                                        {{-- <input type="number" min="1" value="{{ $qty }}" name="item_count" class="cartNo"> --}}

                                        {{-- <noscript><input type="submit" name="submit"></noscript>
                                    </form> --}}
{{-- <input type="text" min="1" value="1" name="cartNo" class="cartNo"> --}}
                                
                            {{-- </div> --}}
                        </div>
                    </div>
                    <a href="#" class="primary-btn add-to-cart ml-3" title="Add to cart" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}" data-type="1" ><i class="fa fa-shopping-cart"></i> ADD TO CART</a>
                    <a href="#" title="Add to Wishlist" class="heart-icon add-to-wishlist" data-product="{{ $product->id }}"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> 
                            @if($product->availableItems > 0)
                                <span>In Stock</span>
                            @else
                                <span>Out Of Stock</span>
                            @endif
                        </li>
                        {{-- <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li> --}}
                    <li><b>Unit Type</b> 
                        @if($product->unit == 'pcs')
                            <span>Pieces (pcs)</span>
                        @elseif($product->unit == 'package')
                            <span>Packages </span>
                        @elseif($product->unit == 'set')
                            <span>Set </span>
                        @elseif($product->unit == 'dozen')
                            <span>Dozen </span>
                        @elseif($product->unit == 'kg')
                            <span>Kilogram (kg) </span>
                        @elseif($product->unit == 'h_kg')
                            <span>1/2 Kilogram (kg)</span>
                        @elseif($product->unit == 'q_kg')
                            <span>1/4 Kilogram (kg) </span>
                        @endif
                    </li>

                    <li><b>Delivery Area </b> <span>{{ $product->delivery_area }}</span></li>
                    <li><b>Delivery Time</b> <span>
                        @php 
                        if($product->delivery_time == 1){
                            echo '1 Day';
                        }elseif($product->delivery_time == 3){
                            echo '3 Days';
                        }elseif($product->delivery_time == 7){
                            echo '7 Days';
                        }elseif($product->delivery_time == 15){
                            echo '15 Days';
                        }else{
                            echo '';
                        }

                        @endphp
                    </span></li>
                    <li><b>Shipping Charge (RS.)</b> <span>{{ $product->shipping_charge }}</span></li>
                        {{-- <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
            {{-- @if( $product->reviews()->count() > 0 || $product->description ) --}}
            <div class="col-lg-12" style="padding: 20px 0px;">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        {{-- @if( $product->description ) --}}
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        {{-- @endif --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">See Reviews <span>({{ $product->reviews()->count() }})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @if( $product->description )
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                            <p>{{ $product->description }}</p>
                            </div>
                        </div>
                        @else
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                            
                                <div class="row review m-0">
                                    <div class="col-sm-3">
                                        <p>No Description Available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc reviews">
                                <h6>Recent Reviews:</h6>
                                @if( $product->reviews()->count() > 0 )
                                @foreach($product->reviews()->latest()->get()->take(3) as $review)
                                <div class="row review m-0">
                                    <div class="col-sm-3">
                                        <ul>
                                            <li><i class="fa fa-user icon"></i><a href="">{{ $review->user->username }}</a></li>
                                            <li><i class="fa fa-calendar-o icon"></i><a href="">{{ date('Y-m-d', strtotime($review->created_at)) }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>
                                            <span class="rate">
                                                <i class="fa fa-star {{ $review->rating >= 1 ? 'orange' : '' }}"></i>
                                                <i class="fa fa-star {{ $review->rating >= 2 ? 'orange' : '' }}"></i>
                                                <i class="fa fa-star {{ $review->rating >= 3 ? 'orange' : '' }}"></i>
                                                <i class="fa fa-star {{ $review->rating >= 4 ? 'orange' : '' }}"></i>
                                                <i class="fa fa-star {{ $review->rating >= 5 ? 'orange' : '' }}"></i>
                                            </span>
                                            <span class="title pl-20">{{ $review->reviewTitle }}</span>
                                        </h5>
                                        <p>{!! $review->reviewDesc !!}</p>
                                    </div>  
                                </div>
                                    
                                @endforeach
                                @else
                                <div class="row review m-0">
                                    <div class="col-sm-3">
                                        <p>No Reviews Available</p>
                                    </div>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endif --}}

            <div class="col-sm-12 col-xs-12 col-md-6 offset-md-3" style="padding-top: 30px">                
                @auth
                    <div class="col-md-12">
                        <div class="section-title related__product__title">
                            <h2>Leave a Review</h2>
                        </div>
                        @include('errors.errors')
                        <form action="{{ route('product.review') }}" method="post" class="pl-2">
                            {{csrf_field()}}
                            
                            <div class="aa-your-rating">
                                <div class="form-group" id="rating" style="display: inline-flex;">
                                    <small>Rate this product&nbsp;&nbsp;</small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Review Title*</label>
                                <input type="text" class="form-control" name="reviewTitle" id="name" placeholder="Name" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="">Your Review</label>
                                <textarea class="form-control" name="reviewDesc" rows="3" id="message"></textarea>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                            <button type="submit" class="btn btn-default pull-right site-btn">
                                Submit
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($productsOfCategory as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" style="background-size: 170px;">
                        <ul class="product__item__pic__hover">
                            <li><a href="#" class="add-to-wishlist" data-product="{{ $product->id }}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{ route('view.product.new11', $product->slug) }}"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" class="add-to-cart" title="Add to cart" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('view.product.new11', $product->slug) }}">{{ $product->productName }}</a></h6>
                        <h5>NRS. {{ $product->rate }}</h5>
                        @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Related Product Section End -->


@endsection

@section('scripts')

<script src="{{ secure_asset('js/jquery.emojiRatings.min.js') }}"></script>
<script defer src="{{ secure_asset('js/jquery.elevateZoom-3.0.8.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#zoom_10").elevateZoom({
            easing : true,
            zoomWindowWidth:350,
            zoomWindowHeight:350,
            zoomWindowPosition: 1, zoomWindowOffetx: 250
        });
    });
    $("#rating").emojiRating({
                fontSize: 20,
                onUpdate: function(count) {
                    $(".review-text").show();
                    $("#starCount").html(count + " Star");
                    var rating = $('.emoji-rating').val();
                    $('#rating-input').val(rating);
                }
            });


            $('#order-submit').click(function(e){
                $(this).prop('disabled', true);
                $('#oform').submit();
            });
</script>

@endsection
