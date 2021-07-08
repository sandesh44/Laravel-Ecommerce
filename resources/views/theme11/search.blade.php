@extends('theme11.layouts.main')

@section('head')
    @include('theme11.layouts.head')
@endsection

@section('hero')
    @include('theme11.layouts.hero')
@endsection

<style>
    .hero{
        padding-bottom: unset !important;
    }
</style>
@section('content')
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" data-setbg="{{ secure_asset('themes/11/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                <h2>{{ $title }}</h2>
                    <div class="breadcrumb__option">
                    <a href="{{ url('/theme11') }}">Home</a>
                        <span>Search Results</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Category</h4>
                        <ul>
                            @foreach( App\Category::latest()->get()->take(12) as $category)
                        <li><a href="{{ route('category.product.new11', $category->slug) }}">{{ ucfirst($category->name) }} <small> ({{ $category->products()->count() }})</small></a></li>
                        @endforeach
                        </ul>
                    </div>
                    
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">

                                    <?php $latestproducts = App\Product::where('featured', 0)->latest()->take(4)->get(); ?>
                                    @foreach ($latestproducts as $product)

                                    <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic most_pro">
                                            <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->productName }}</h6>
                                            <span>NRS. {{ $product->rate }}</span>
                                            @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php $latestproducts = App\Product::where('featured', 0)->latest()->skip(4)->take(4)->get(); ?>
                                        @foreach ($latestproducts as $product)
                                    
                                        <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic most_pro">
                                            <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->productName }}</h6>
                                            <span>NRS. {{ $product->rate }}</span>
                                            @if($product->rate == $product->actualRate)

                        @else
                            <del class="product-old-price" style="color: red;">Rs. {{ $product->actualRate }}</del>
                        @endif
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">
               
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select class="input sort-product" name="sort">
                                    <option value="name">Name <i class="fa fa-chevron-down"></i></option>
                                    <option value="low_high" {{ request()->sort == 'low_high' ? 'selected' : '' }}>Price: Low to High</option>
                                    <option value="high_low" {{ request()->sort == 'high_low' ? 'selected' : '' }}>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{ count($products) }}</span> products found</h6>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="row">
                    @if( count($products) )
                            @foreach ( $products as $product )

                    <div class="col-lg-4 col-md-6 col-sm-6">
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

                    @else
                        <h4>No Products Available</h4>
                    @endif
                    
                   
                </div>

                <div class="store-filter clearfix product__pagination">
                        {{ $products->links() }}
                </div>


            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection
