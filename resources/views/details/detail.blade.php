@extends('layouts.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb">
<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Products</a></li>
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active">@foreach ($product as $item)
            {{$item->productName}}
        @endforeach</li>
    </ul>
</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
<!-- container -->
<div class="container">
            <!--  Product Details -->
            <div class="product product-details clearfix">
    <!-- row -->
    <div class="row">

            <div class="col-md-6">
                <div id="product-main-view">
                    <div class="product-view">
                        @foreach ($product as $item)
                        <img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt="">
                        @endforeach
                    </div>
                    
                    <div class="product-view">
                        @foreach ($product as $item)
                        <img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt="">
                        @endforeach
                    </div>
                                            

                </div>
                <div id="product-view">
                    <div class="product-view">
                        @foreach ($product as $item)
                        <img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @foreach ($product as $item)
                <div class="product-body">
                    <div class="product-label">    
                    <span class="sale">Get {{$item->discountPercent}} off</span>
                    </div>
                    <h2 class="product-name">{{$item->productName}}</h2>
                    <h3 class="product-price">Rs. {{$item->rate}} 
                    <del class="product-old-price">Rs. {{$item->actualRate}}</del>
                    </h3>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <a data-toggle="tab" href="show">0 Review(s) / Add Review</a>
                    </div>
                    <p><strong>Availability:</strong> @php
                        if($item->featured == 1){
                            echo "IN Stock";
                        }else{
                            echo "Off Stock";
                        }

                    @endphp</p>
                    <p><strong>Brand:</strong> </p>
                    <p>{{$item->productName}}</p>

                    {{-- <div class="product-options">
                        <ul class="size-option">
                            <li><span class="text-uppercase">Size:</span></li>
                            <li class="active"><a href="#">S</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">SL</a></li>
                        </ul>
                        <ul class="color-option">
                            <li><span class="text-uppercase">Color:</span></li>
                            <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                            <li><a href="#" style="background-color:#8A2454;"></a></li>
                            <li><a href="#" style="background-color:#BF6989;"></a></li>
                            <li><a href="#" style="background-color:#9A54D8;"></a></li>
                        </ul>
                    </div> --}}

                    <div class="product-btns">
                        <form action="/add_to_cart" method="POST">
                            @csrf
                        <div class="qty-input">
                            <span class="text-uppercase">QTY: </span>
                            <input class="input" type="number" value="1" name="quantity">
                        </div>
                        
                           
                            <input type="hidden" name="product_id" value="{{$item->id}}">
                            <button class="btn btn-success" title="Add to cart" data-productid="22" data-product="KiTCHEN RECiPE Akabare in Vinegar" data-rate="400"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </form>
                        <div class="pull-right">
                            <button class="main-btn icon-btn add-to-wishlist" data-product="22"><i class="fa fa-heart"></i></button>
                            
                            <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="col-md-12">
                <div class="product-tab">
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab1">Details</a></li>
                        <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                        <p>Akabare Pickle in Vinegar...</p>
                        </div>
                        <div id="tab2" class="tab-pane fade in">

                            <div class="row">
                                <div class="col-md-6">
                                    @foreach ($rating as $item)
                                    <div class="product-reviews">
                                        <div class="single-review">
                                            <div class="review-heading">
                                                <div><a href="#"><i class="fa fa-user-o"></i> {{$item->name}}</a></div>
                                                <div><a href="#"><i class="fa fa-clock-o"></i> {{$item->created_at}}</a></div>
                                                <div class="review-rating pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                            </div>
                                            <div class="review-body">
                                            <p>{{$item->review}}</p>
                                            </div>
                                        </div>


                                    </div>
                                    @endforeach
                                    <ul class="reviews-pages">
                                        <li class="active">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                    </ul>
                                </div>                                    
                                <div class="col-md-6" id="show">
                                    <h4 class="text-uppercase">Write Your Review</h4>
                                    <p>Your email address will not be published.</p>
                                    <form class="review-form" method="POST" action="/rating">
                                        @csrf
                                        <input type="hidden" value="{{$item->id}}" name="product_id">
                                        <div class="form-group">
                                            <input class="input" type="text" placeholder="Your Name" name="name" />
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="email" placeholder="Email Address" name="email"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="input" placeholder="Your review" name="review"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-rating">
                                                <strong class="text-uppercase">Your Rating: </strong>
                                                <div class="stars">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- /row -->
    
</div>
<!-- /Product Details -->
</div>
<!-- /container -->
</div>
<!-- /section -->

@endsection