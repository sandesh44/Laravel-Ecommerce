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
                    <a href="{{ url('/') }}">Home</a>
                        <span>Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{ secure_asset('uploads/products/thumbnails/'.$item->model->featuredImage)}}" alt="" style="height: 110px;">
                                    <h5>
                                        <a class="black" href="{{ route('view.product.new11', $item->model->slug) }}">{{ ucfirst($item->model->productName) }}</a>
                                    </h5>
                                </td>
                                <td class="shoping__cart__price">
                                    NRs. {{ $item->model->rate }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <!-- <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{ $item->qty }}">
                                        </div>
                                    </div> -->
                                    <form action="{{ route('cart.update', $item->rowId) }}" method="post" class="submit-form" >
                                        {{csrf_field()}}
                                        {{ method_field('PUT') }}
                                        <select name="item_count" class="form-control" style="">
                                            <?php for ($i=1; $i <= 10; $i++) { ?>
                                                <option value="{{$i}}" {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option>
                                            <?php } ?>
                                        </select>
                                        <noscript><input type="submit" name="submit"></noscript>
                                    </form>

                                </td>
                                <td class="shoping__cart__total">
                                    NRs. {{ $item->model->rate * $item->qty }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    
                                    <a class="main-btn icon-btn btn btn-danger" href="#" onclick="event.preventDefault();document.getElementById('remove-item-{{$item->rowId}}').submit();"><i class="fa fa-close remove-icon"></i></a>
                                <form id="remove-item-{{$item->rowId}}" action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                {{csrf_field()}}
                                {{ method_field('delete') }}
                            </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                <a href="{{ url('/') }}" class="primary-btn cart-btn border">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right border"><span class="icon_loading"></span>
                        Update Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>NRS. {{ Cart::subtotal() }}</span></li>
                        <li>Shipping <span>-</span></li>
                        <li>Total <span>NRs. {{ Cart::subtotal() }}/-</span></li>
                    </ul>
                    @auth
                    <a href="{{ route('checkout.view11') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    @endauth
                    @guest
                    <a href="{{ route('checkout.view11') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    {{-- <a href="#" class="primary-btn show-login">PROCEED TO CHECKOUT</a> --}}
                    @endguest
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection

@section('login_modals')
    @include('theme11.layouts.login_modals')    
@endsection
{{-- @yield('login_modals') --}}
