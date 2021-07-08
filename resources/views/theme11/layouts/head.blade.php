   <!-- Humberger Begin -->
   <div class="humberger__menu__overlay"></div>
   <div class="humberger__menu__wrapper">
       <div class="humberger__menu__logo">
       <a href="{{ url('/') }}"><img src="{{ secure_asset('themes/11/img/royaldharan22.png') }}" alt="" style="width: 190px;"></a>
       </div>
       <div class="humberger__menu__cart">
           <ul>
                @php
                       
                  $userid = Auth::id();
                  $wishlist = DB::table('wishlists')
                      ->where('userId' , $userid)
                      ->where('deleted' , '0')
                      ->get();
                  $wishcount = $wishlist->count();
                @endphp

                 @auth
                 <li><a href="{{ route('wish11', Auth::id()) }}"><i class="fa fa-heart"></i> <span>{{ $wishcount }}</span></a></li>
                 @endauth

                 @guest
                 <li><a href="{{ route('login.new11') }}" class="show-login-form"><i class="fa fa-heart"></i> <span></span></a></li>
                 @endguest
                 <li><a href="{{ url('/show-cart') }}" ><i class="fa fa-shopping-bag"></i> <span class="total-count">{{ Cart::instance('default')->count() }}</span></a></li>
           </ul>
       </div>
       <div class="humberger__menu__widget">
           {{-- <div class="header__top__right__language">
               <img src="{{ asset('themes/11/img/language.png') }}" alt="">
               <div>English</div>
               <span class="arrow_carrot-down"></span>
               <ul>
                   <li><a href="#">Spanis</a></li>
                   <li><a href="#">English</a></li>
               </ul>
           </div> --}}
           <div class="header__top__right__auth">
               <a href="{{ url('/login_new') }}"><i class="fa fa-user"></i> Login</a>
           </div>
       </div>
       <nav class="humberger__menu__nav mobile-menu">
           <ul>
           <li class="active"><a href="{{ url('/') }}">Home</a></li>
               {{-- <li><a href="./shop-grid.html">Shop</a></li> --}}
               <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ route('featured.all') }}">Featured Products</a></li>
                    <li><a href="{{ route('products.more') }}">View All Products</a></li>
                </ul>
                </li>
                
               <li><a href="#">Contact</a></li>
           </ul>
       </nav>
       <div id="mobile-menu-wrap"></div>
       <div class="header__top__right__social">
           <a href="#"><i class="fa fa-facebook"></i></a>
           {{-- <a href="#"><i class="fa fa-twitter"></i></a>
           <a href="#"><i class="fa fa-linkedin"></i></a>
           <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
       </div>
       <div class="humberger__menu__contact">
           <ul>
               <li><i class="fa fa-envelope"></i> royaldharanonline@gmail.com</li>
               <li>Free Shipping for all Order</li>
           </ul>
       </div>
   </div>
   <!-- Humberger End -->

   <!-- Header Section Begin -->
   <header class="header">
       <div class="header__top">
           <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-6">
                       <div class="header__top__left">
                           <ul>
                               <li><i class="fa fa-envelope"></i> royaldharanonline@gmail.com</li>
                               <li>Free Shipping for all Order</li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-6">
                       <div class="header__top__right">
                           <div class="header__top__right__social">
                               <a href="#"><i class="fa fa-facebook"></i></a>
                               {{-- <a href="#"><i class="fa fa-twitter"></i></a>
                               <a href="#"><i class="fa fa-linkedin"></i></a>
                               <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                           </div>
                           
                            @auth
                            <div class="header__top__right__language">
                                <a href="{{ url('/admin') }}" class=""><i class="fa fa-dashboard"></i> Admin</a>
                            </div>
                            @endauth
                           
                           <div class="header__top__right__auth">
                               
                               @guest
                               <a href="{{ url('/login_new') }}" class="show-login-form"><i class="fa fa-user"></i> Login</a>
                               @else
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{csrf_field()}}
                                </form>
                               @endguest
                               
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="container">
           <div class="row">
               <div class="col-lg-3">
                   <div class="header__logo">
                   <a href="{{ url('/') }}"><img src="{{ secure_asset('themes/11/img/royaldharan22.png') }}" alt="" style="width: 190px;"></a>
                   </div>
               </div>
               <div class="col-lg-6">
                   <nav class="header__menu">
                       <ul>
                           <li class="active"><a href="{{ url('/') }}">Home</a></li>
                           <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{ route('featured.all') }}">Featured Products</a></li>
                                <li><a href="{{ route('products.more') }}">View All Products</a></li>
                            </ul>
                        </li>
                           {{-- <li><a href="./blog.html">Blog</a></li> --}}
                           <li><a href="#">Contact</a></li>
                       </ul>
                   </nav>
               </div>
               <div class="col-lg-3">
                   <div class="header__cart">
                       <ul>
                        @php
                       
                        $userid = Auth::id();
                        $wishlist = DB::table('wishlists')
                            ->where('userId' , $userid)
                            ->where('deleted' , '0')
                            ->get();
                        $wishcount = $wishlist->count();
                    @endphp

                           @auth
                           <li><a href="{{ route('wish11', Auth::id()) }}"><i class="fa fa-heart"></i> <span>{{ $wishcount }}</span></a></li>
                           @endauth

                           @guest
                           <li><a href="{{ route('login.new11') }}" class="show-login-form"><i class="fa fa-heart"></i> <span></span></a></li>
                           @endguest
                           <li><a href="{{ url('/show-cart') }}" ><i class="fa fa-shopping-bag"></i> <span class="total-count">{{ Cart::instance('default')->count() }}</span></a></li>
                           
                       </ul>
                   </div>
               </div>
           </div>
           <div class="humberger__open">
               <i class="fa fa-bars"></i>
           </div>
       </div>
   </header>
   <!-- Header Section End -->