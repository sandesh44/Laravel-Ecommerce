  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach( App\Category::latest()->get()->take(12) as $category)
                        <li>
                            <a href="{{ route('category.product.new11', $category->slug) }}">{{ $category->name }}
                                <small>({{$category->products()->count()}} items)</small>
                            </a>
                        </li>
                        @endforeach
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
                            <h5>+977 9804075821</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>

                <?php $slides = App\Sliders::orderBy('sliderId', 'desc')->take(1)->get(); ?>
                @if( count($slides) )
                @foreach($slides as $slide)
                <?php $category = App\Category::find($slide->categoryId); ?>
                    <div class="hero__item set-bg" data-setbg="{{ '../uploads/sliders/' . $slide->sliderImage }}">
                        <div class="hero__text">
                            <span><a href="{{ route('category.product.new11', $category->slug) }}">{{ $slide->textMain }}</a></span>
                            {{-- {{ route('category.product.new11', $category->slug) }} --}}
                            <h2><a href="{{ route('category.product.new11', $category->slug) }}" style="color:#252525;text-shadow: 1px 1px 1px #2525">
                                {{ $slide->categoryName }}
                            </a></h2>
                            <p>{{ $slide->textSecondary }}</p>
                         </div>
                    </div>

                @endforeach
                @else
                    <div class="hero__item set-bg" data-setbg="{{ asset('themes/11/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn show-slider">Shop Now</a>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->