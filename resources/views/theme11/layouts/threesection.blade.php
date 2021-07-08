<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php $products = App\Product::where('featured', 0)->latest()->take(3)->get(); ?>
                            @foreach ($products as $product)
                                <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
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
                            @endforeach
                            
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php App\Product::where('featured', 0)->latest()->skip(3)->take(6)->get(); ?>
                            @foreach ($products as $product)
                            <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
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
                            <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
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
                            @endforeach
                            @else
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="https://via.placeholder.com/110x110?text=Coming%20Soon" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Vegetables</h6>
                                    <span>NRS 30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="https://via.placeholder.com/110x110?text=Coming%20Soon" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Fruits</h6>
                                    <span>NRS 30.00</span>
                                </div>
                            </a>
                            @endif
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php $topsellers = App\Product::orderBy('totalSoldQuantity', 'DESC')->skip(3)->take(3)->get(); ?>
                            @if( count($topsellers) )
                            @foreach($topsellers as $product)
                            
                            <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
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
                            @endforeach
                            @else
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://via.placeholder.com/110x110?text=Coming%20Soon" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Vegetables</h6>
                                        <span>NRS 30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://via.placeholder.com/110x110?text=Coming%20Soon" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Fruits</h6>
                                        <span>NRS 30.00</span>
                                    </div>
                                </a>
                            @endif

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
                            
                            <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
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
                            @endforeach
                            @else
                            <?php $arr = ['Fruits', 'Vegetables']; ?>
                            <?php foreach ($arr as $key): ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://via.placeholder.com/110x110?text=Coming%20Soon" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $key }}</h6>
                                        <span>NRS ...</span>
                                    </div>
                                </a>
                            <?php endforeach ?>
                            @endif
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php $more_sellers = App\Product::where('discountPercent', '>', 0)->latest()->skip(3)->take(3)->get(); ?>
                            @if( count($more_sellers) )
                            @foreach($more_sellers as $product)
                            <a href="{{ route('view.product.new11', $product->slug) }}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ secure_asset('uploads/products/thumbnails/' . $product->featuredImage ) }}" alt="">
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

                            @endforeach
                            @else
                            <?php $arr = ['Fruits', 'Vegetables']; ?>
                            <?php foreach ($arr as $key): ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="https://via.placeholder.com/110x110?text=Coming%20Soon" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $key }}</h6>
                                        <span>NRS ...</span>
                                    </div>
                                </a>
                            <?php endforeach ?>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->