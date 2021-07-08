@extends('theme11.layouts.main')

<div class="btn btn-primary alert-dismissible show col-md-12 col-sm-12 text-center text-white" role="alert" style="display:grid;">
	<strong>Real-time Items CRUD ( Create/Read/Update/Delete ) </strong> Only Authorized Users can View/Edit this section.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -7px;">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ Session::get("success") }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>{{ Session::get("info") }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@section('head')
    @include('theme11.layouts.head')
@endsection

@section('featured_product')
    <!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                    <a href="#" class="btn btn-primary btn-sm mt-4 show-modal">+ Add Featured Product</a>
                        
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="" data-filter="*">All</li>
                        @php
                            $act = 1;
                        @endphp
                        @foreach( App\Category::latest()->get()->take(6) as $category)

                        <li class="active<?= $act; ?>" data-filter=".{{ $category->slug }}">{{ $category->name }}
                        </li>
                        @php
                            $act++;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            {{-- <div class="col-lg-3 col-md-4 col-sm-6 mix">
                <div class="featured__item" style="background: #f4f5fa;">
                    <div class="featured__item__pic set-bg">
                        <ul class="featured__item__pic__hoverrr">
                            <li style="text-align: center;margin-top: 85px;"><a href="#" class="show-modal"><i class="fa fa-plus"></i> Add Product</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            {{-- @php
                $mix = 1;
            @endphp --}}
            @foreach( App\Product::where('featured', 1)->latest()->get()->take(8) as $product)
            {{-- @if($mix == 1) --}}
            {{-- <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->Category->slug}}">
                <div class="featured__item">
                    <a href="#">Add New</a>
                </div>
            </div> --}}
            {{-- @else --}}
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->Category->slug}}">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="{{ route('products.edit', $product->id) }}" class="" target="_blank"><i class="fa fa-pencil"></i></a></li>
                             <li><a href="#" class="">
                                 <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                var r=confirm('Are you sure you want to delete this item?');
                                if(r== true){ this.submit(); }" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <i class="fa fa-trash"><input type="hidden" class="delete-btn"></i>
                                </form>
                            </a></li>
                                
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('view.product.new11', $product->slug) }}">{{ $product->productName }}</a></h6>
                        <h5>NRS {{ $product->rate }}</h5>
                        @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                    </div>
                </div>
            </div>

            {{-- @endif 

            @php
                $mix++;                
            @endphp --}}

            @endforeach

            
                        

        </div>
    </div>
</section>
<!-- Featured Section End -->
@endsection

@section('hero_main')
      <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
                    <ul>
                        @foreach( App\Category::latest()->get()->take(12) as $category)
                        <li><a href="{{ route('category.product.new11', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach

                        <li><a href="#" class="show-category-modal" style="color: #7fad39;font-size: 18px;font-weight: 700;">Add New Category</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        {{-- <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form> --}}

                        <form action="{{ route('search.product11') }}" method="post" class="header_search_form clearfix">
							{{ csrf_field() }}
							<input type="text" name="search" class="input search-input" placeholder="Search For Products" required="required">
							
							<button class="site-btn" type="submit" value="Search"><i class="fa fa-search"></i></button>
                        </form>
                        

                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>

                <?php $slides = App\Sliders::latest()->take(1)->get(); ?>
                @if( count($slides) )
                @foreach($slides as $slide)
                    <div class="hero__item set-bg" data-setbg="{{ '../uploads/sliders/' . $slide->sliderImage }}">
                        <div class="hero__text">
                            <span>{{ $slide->textMain }}</span>
                            <h2>{{ $slide->categoryName }}</h2>
                            <p>{{ $slide->textSecondary }}</p>
                            <a href="{{ route('sliders.edit', $slide->sliderId) }}" target="_blank" class="primary-btn">Edit</a>
                            {{-- <a href="#" class="primary-btn show-slider">Add New Slider</a> --}}
                        </div>
                    </div>

                @endforeach
                @else
                    <div class="hero__item set-bg" data-setbg="{{ asset('themes/11/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn show-slider">Add New Slider</a>
                        </div>
                    </div>

                @endif
                <a href="#" class="primary-btn show-slider float-right mt-3">Add New Slider</a>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@endsection



@section('slider')
    @include('theme11.layouts.slider')
@endsection

@section('threesection')
    <!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products
                        <a href="#" class="btn btn-primary btn-sm show-modal_2">+ Add</a>
                    </h4>
                    
                      
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php $products = App\Product::where('featured', 0)->latest()->take(3)->get(); ?>
                            @foreach ($products as $product)
                            <div class="row">
                                <div class="col-md-12">
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->productName }}</h6>
                                        <span>NRS {{ $product->rate }}</span>
                                        @if($product->rate == $product->actualRate)

                                        @else
                                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                                        @endif
                                    </div>
                                </a>
                                </div>

                                <div class="col-md-12">

                                <a href="{{ route('products.edit', $product->id) }}" target="_blank" class="btn btn-primary btn-sm float-left">Edit</a>
                                <a href="#" class="float-right mr-5">
                                    <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                   var r=confirm('Are you sure you want to delete this item?');
                                   if(r== true){ this.submit(); }" method="post">
                               {{ csrf_field() }}
                               {{ method_field('delete') }}
                               <i class="fa fa-trash" style="color: red;"><input type="hidden" class="delete-btn"></i>
                                   </form>
                               </a>
                                </div>

                                </div><hr>
                                @endforeach
                            
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php $products = App\Product::where('featured', 0)->latest()->skip(3)->take(3)->get(); ?>
                            @foreach ($products as $product)
                            <div class="row">
                                <div class="col-md-12">
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->productName }}</h6>
                                        <span>NRS {{ $product->rate }}</span>
                                        @if($product->rate == $product->actualRate)

                                        @else
                                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                                        @endif
                                    </div>
                                </a>
                                </div>

                                <div class="col-md-12">

                                <a href="{{ route('products.edit', $product->id) }}" target="_blank" class="btn btn-primary btn-sm float-left">Edit</a>
                                <a href="#" class="float-right mr-5">
                                    <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                   var r=confirm('Are you sure you want to delete this item?');
                                   if(r== true){ this.submit(); }" method="post">
                               {{ csrf_field() }}
                               {{ method_field('delete') }}
                               <i class="fa fa-trash" style="color: red;"><input type="hidden" class="delete-btn"></i>
                                   </form>
                               </a>
                                </div>

                                </div><hr>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @if( $topsellers = App\Product::productMostBought(3) )
							@foreach($topsellers as $product)
                            <div class="row">
                                <div class="col-md-12">
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->productName }}</h6>
                                        <span>NRS {{ $product->rate }}</span>
                                        @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                                    </div>
                                </a>
                                </div>

                                <div class="col-md-12">

                                <a href="{{ route('products.edit', $product->id) }}" target="_blank" class="btn btn-primary btn-sm float-left">Edit</a>
                                <a href="#" class="float-right mr-5">
                                    <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                        var r=confirm('Are you sure you want to delete this item?');
                                        if(r== true){ this.submit(); }" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <i class="fa fa-trash" style="color: red;"><input type="hidden" class="delete-btn"></i>
                                        </form>
                                </a>
                                </div>

                                </div><hr>
                            @endforeach
                            @else
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>NRS 30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>NRS 30.00</span>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php $topsellers = App\Product::orderBy('totalSoldQuantity', 'DESC')->skip(3)->take(3)->get(); ?>
                            @foreach($topsellers as $product)
                            
                            <div class="row">
                                <div class="col-md-12">
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->productName }}</h6>
                                        <span>NRS {{ $product->rate }}</span>
                                        @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                                    </div>
                                </a>
                                </div>

                                <div class="col-md-12">

                                <a href="{{ route('products.edit', $product->id) }}" target="_blank" class="btn btn-primary btn-sm float-left">Edit</a>
                                <a href="#" class="float-right mr-5">
                                    <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                        var r=confirm('Are you sure you want to delete this item?');
                                        if(r== true){ this.submit(); }" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <i class="fa fa-trash" style="color: red;"><input type="hidden" class="delete-btn"></i>
                                        </form>
                                </a>
                                </div>

                                </div><hr>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Most Sold Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">

                            @if( $topsellers = App\Product::productSales(3) )
                            @foreach($topsellers as $product)
                            
                            <div class="row">
                                <div class="col-md-12">
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->productName }}</h6>
                                        <span>NRS {{ $product->rate }}</span>
                                        @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                                    </div>
                                </a>
                                </div>

                                <div class="col-md-12">

                                <a href="{{ route('products.edit', $product->id) }}" target="_blank" class="btn btn-primary btn-sm float-left">Edit</a>
                                <a href="#" class="float-right mr-5">
                                    <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                        var r=confirm('Are you sure you want to delete this item?');
                                        if(r== true){ this.submit(); }" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <i class="fa fa-trash" style="color: red;"><input type="hidden" class="delete-btn"></i>
                                        </form>
                                </a>
                                </div>

                                </div><hr>
                            @endforeach
                            @endif
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php $more_sellers = App\Product::where('discountPercent', '>', 0)->latest()->skip(3)->take(3)->get(); ?>
                            @foreach($more_sellers as $product)
                            <div class="row">
                                <div class="col-md-12">
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->productName }}</h6>
                                        <span>NRS {{ $product->rate }}</span>
                                        @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                                    </div>
                                </a>
                                </div>

                                <div class="col-md-12">

                                <a href="{{ route('products.edit', $product->id) }}" target="_blank" class="btn btn-primary btn-sm float-left">Edit</a>
                                <a href="#" class="float-right mr-5">
                                    <form action="{{route('products.destroy', $product->id)}}" onclick="event.preventDefault();
                                        var r=confirm('Are you sure you want to delete this item?');
                                        if(r== true){ this.submit(); }" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <i class="fa fa-trash" style="color: red;"><input type="hidden" class="delete-btn"></i>
                                        </form>
                                </a>
                                </div>

                                </div><hr>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->
@endsection

@section('banner')
    <!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-12">
                <a href="#" class="primary-btn show-offer-modal">Add Offers</a>
            </div> --}}
            <?php
            // $offers = DB::table('offers')->latest()->take(2)->get();
            $slides = App\Sliders::latest()->skip(1)->take(2)->get();
            ?>
            @if( count($slides) )
            @foreach($slides as $slide)

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ '../uploads/sliders/' . $slide->sliderImage }}" height="265" alt="">
                        <a href="{{ route('sliders.edit', $slide->sliderId) }}" target="_blank" class="primary-btn">Edit</a>
                            
                    </div>
                </div>

            @endforeach
            @else

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('themes/11/img/banner/banner-1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('themes/11/img/banner/banner-2.jpg') }}" alt="">
                </div>
            </div>

            @endif
        </div>
    </div>
</div>
<!-- Banner End -->
@endsection

@section('login_modals')
    @include('theme11.layouts.login_modals')
@endsection

@section('insert_modals')
    @include('theme11.layouts.insert_modals')
@endsection



