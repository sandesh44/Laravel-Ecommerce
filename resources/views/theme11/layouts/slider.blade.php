 <!-- sliders Section Begin -->
<style>
    .categories__slider h5{
        font-size: 18px;
        color: #1c1c1c;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 12px 0 10px;
        background: #ffffff;
        display: block;
        width: 200px;
        margin-left: 30px;
    }
</style>
 <section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach( App\Category::latest()->get()->take(12) as $category)

                <div class="col-lg-3">
                    <a href="{{ route('category.product.new11', $category->slug) }}">
                    <div class="categories__item set-bg" data-setbg="{{ secure_asset( $category->image ) }}">
                    <h5>{{ $category->name }}</h5>
                    </div>
                    </a>
                </div>

                @endforeach

                {{-- <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('themes/11/img/categories/cat-2.jpg') }}">
                        <h5><a href="#">Dried Fruit</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('themes/11/img/categories/cat-3.jpg') }}">
                        <h5><a href="#">Vegetables</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('themes/11/img/categories/cat-4.jpg') }}">
                        <h5><a href="#">drink fruits</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('themes/11/img/categories/cat-5.jpg') }}">
                        <h5><a href="#">drink fruits</a></h5>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- sliders Section End -->