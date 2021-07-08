<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <?php
            // $offers = DB::table('offers')->latest()->take(2)->get();
            $slides = App\Sliders::orderBy('sliderId', 'desc')->skip(1)->take(2)->get();
            ?>
            @if( count($slides) > 1 )
            @foreach($slides as $slide)

                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        @php
                            $cat = strtolower($slide->categoryName);
                            $cat1 = str_replace(' ', '-', $cat);
                        @endphp
                    <a href="{{ route('category.product.new11', $cat1 )  }}"><img src="{{ 'uploads/sliders/' . $slide->sliderImage }}" alt="" height="265"></a>
                    </div>
                </div> --}}
<div class="col-md-6 col-lg-6 col-sm-12 ">
                <div class="hero__item set-bg" data-setbg="{{ '../uploads/sliders/' . $slide->sliderImage }}" style="height: 265px;background-clip: padding-box;">
                    <div class="hero__text" style="margin-left: auto;padding-right: 15px;">
                        @php
                            $cat = strtolower($slide->categoryName);
                            $cat1 = str_replace(' ', '-', $cat);
                        @endphp
                        
                        <span>{{ $slide->textMain }}</span>
                        <h2><a href="{{ route('category.product.new11', $cat1 )  }}">{{ $slide->categoryName }}</a></h2>
                        <p>{{ $slide->textSecondary }}</p>
                     </div>
                </div>
            </div>
            @endforeach
            @else

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ secure_asset('themes/11/img/banner/banner-1.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ secure_asset('themes/11/img/banner/banner-2.jpg') }}" alt="">
                </div>
            </div>

            @endif
        </div>
    </div>
</div>
<!-- Banner End -->