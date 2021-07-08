@extends('layouts.master')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
            <li class="breadcrumb-item active">@foreach ($category as $item)
                {{$item->name}}
            @endforeach</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside widget -->
                
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filter by Price</h3>
                    <div id="price-slider" class="price-slider"></div>
                </div>
                <!-- aside widget -->

                <!-- aside widget -->
                {{-- <div class="aside">
                    <h3 class="aside-title">Filter By Color:</h3>
                    <ul class="color-option">
                        <li><a href="#" style="background-color:#475984;"></a></li>
                        <li><a href="#" style="background-color:#8A2454;"></a></li>
                        <li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
                        <li><a href="#" style="background-color:#9A54D8;"></a></li>
                        <li><a href="#" style="background-color:#675F52;"></a></li>
                        <li><a href="#" style="background-color:#050505;"></a></li>
                        <li><a href="#" style="background-color:#D5B47B;"></a></li>
                    </ul>
                </div> --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                {{-- <div class="aside">
                    <h3 class="aside-title">Filter By Size:</h3>
                    <ul class="size-option">
                        <li class="active"><a href="#">S</a></li>
                        <li class="active"><a href="#">XL</a></li>
                        <li><a href="#">SL</a></li>
                    </ul>
                </div> --}}
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filter by Brand</h3>
                    <ul class="list-links">
                        <li><a href="#">Nike</a></li>
                        <li><a href="#">Adidas</a></li>
                        <li><a href="#">Polo</a></li>
                        <li><a href="#">Lacost</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->


                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Top Rated Product</h3>
                                                            <!-- widget product -->
                    @foreach ($rating as $item)
                    <div class="product product-widget">
                        <div class="product-thumb" >
                        
                            <img  src="{{ asset( 'uploads/products/'.$item->image ) }}" alt="">
                            
                    </div> 
                    <div class="product-body">
                        <h2 class="product-name"><a href="/details/detail/{{$item->slug}}">{{$item->name}}</a></h2>
                        <h3 class="product-price">Rs. {{$item->price}} <del class="product-old-price">Rs. {{$item->rate}}</del></h3>
                        @if ($item->rating == 5)
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                           @elseif($item->rating == 4)
                           <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                           </div>
                            @elseif($item->rating == 3)
                           <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                           </div>
                           @elseif($item->rating == 2)
                           <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                           </div>
                           @elseif($item->rating == 1)
                           <div class="product-rating">
                            <i class="fa fa-star"></i>
                           </div>

                           @endif
                        </div>
                    </div>
                    @endforeach
                    <!-- /widget product -->
                                        <!-- widget product -->

                    <!-- /widget product -->
                                                        </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <div class="store-filter clearfix">
                    <div class="prod_count pull-left">
                        <div class="shop_product_count"><span>                           
                             @php
                            $total = 0;
                          foreach ($product as $item) {
                               $total +=$item->featured;  
                          }
                          echo $total;
                       @endphp
                       </span> products found</div>
                    </div>
                    <div class="pull-right">
                        <div class="sort-filter">
                            <span class="text-uppercase">Sort By:</span>
                            <select class="input sort-product" name="sort">
                                <option selected>Select</option>
                                <option  value="latest">Latest <i class="fa fa-chevron-down"></i></option>
                                <option value="low_high" >Price: Low to High</option>
                                <option value="high_low" >Price: High to Low</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">
                        @foreach ($product as $item)                            
                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">

                                        <span class="sale">Get {{$item->discountPercent}} off</span>
                                        
                                    </div>
                                    
                                    <a href="/details/detail/{{$item->slug}}"><img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt=""></a>
                                </div>
                                <div class="product-body">
                                <h3 class="product-price">Rs. {{$item->rate}} <del class="product-old-price">Rs. {{$item->actualRate}}</del></h3>
                                    
                                <h2 class="product-name"><a href="/details/detail/{{$item->slug}}">{{$item->productName}}</a></h2>
                                    <div class="product-btns">
                                        <div class="row" style="display: flex">
                                            <div class="col-xs-6 col-sm-6 ">
                                                <button class="main-btn icon-btn add-to-wishlist" data-product="22"><i class="fa fa-heart"></i></button> 
                                            </div>
                                            <div class="col-xs-6 col-sm-6 ">
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
                        <!-- /Product Single -->
                        @endforeach                       
                        

                        <div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>

                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <div class="pull-left">
                        
                        
                    </div>
                    <div class="pull-right">
                        
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->  
@endsection
