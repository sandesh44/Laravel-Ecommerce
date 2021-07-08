<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Products</h2>
                    {{-- <a href="{{ route('featured.all') }}" class="btn btn-info btn-sm mt-4">View More</a> --}}
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="all">All</li>
                        @foreach( App\Category::latest()->get()->take(6) as $category)
                            @if( $category->products()->count() > 0 )
                                <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach( App\Category::latest()->get()->take(6) as $category)
            @if( $category->products()->where('featured', 1)->count() > 0 )
            @foreach( $category->products()->where('featured', 1)->latest()->get()->take(4) as $product)
    
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $category->slug }}">
                <div class="featured__item" style="padding: 30px 15px;background: #f2f5fe;">
                    <div class="featured__item__pic set-bg" data-setbg="{{ secure_asset('uploads/products/' . $product->featuredImage ) }}" style="background-size: 170px;">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#" title="Add to Wishlist" class="add-to-wishlist" data-product="{{ $product->id }}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{ route('view.product.new11', $product->slug) }}"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" class="add-to-cart" title="Add to cart" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}"><i class="fa fa-shopping-cart"></i></a></li>
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

            @endforeach
            @else

            @foreach( $category->products()->latest()->get()->take(4) as $product)
    
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $category->slug }}">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ secure_asset('uploads/products/' . $product->featuredImage ) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#" title="Add to Wishlist" class="add-to-wishlist" data-product="{{ $product->id }}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{ route('view.product.new11', $product->slug) }}"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" class="add-to-cart" title="Add to cart" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}"><i class="fa fa-shopping-cart"></i></a></li>
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

            @endforeach

            @endif
            @endforeach

            {{-- @foreach( App\Product::where('featured', 1)->latest()->get()->take(8) as $product)
            
            <div class="col-lg-3 col-md-4 col-sm-6 mix all">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('uploads/products/' . $product->featuredImage ) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#" title="Add to Wishlist" class="add-to-wishlist" data-product="{{ $product->id }}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{ route('view.product.new11', $product->slug) }}"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" class="add-to-cart" title="Add to cart" data-productid="{{$product->id}}" data-product="{{ $product->productName }}" data-rate="{{ $product->rate }}"><i class="fa fa-shopping-cart"></i></a></li>
                                
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ route('view.product.new11', $product->slug) }}">{{ $product->productName }}</a></h6>
                        <h5>NRS {{ $product->rate }}</h5>
                    </div>
                </div>
            </div>

            @endforeach
            --}}

            {{-- <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-2.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-3.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-4.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-5.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-6.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-7.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('themes/11/img/featured/feature-8.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>NRS 30.00</h5>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Featured Section End -->