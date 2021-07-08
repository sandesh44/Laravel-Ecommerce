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
   <section class="breadcrumb-section set-bg" data-setbg="{{ asset('themes/11/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                <h2>{{ $title }}</h2>
                    <div class="breadcrumb__option">
                    <a href="{{ url('/theme11') }}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>

            @include('errors.errors')
            <form method="post" action="{{ route('checkout.newstore') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8 col-md-6" style="background-color: whitesmoke;padding: 26px 26px;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Full Name<span>*</span></p>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="user_email" value="{{ old('user_email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="number" placeholder="Phone Number" value="{{ old('number') }}" required>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" name="delivery_address" placeholder="Street Address" class="checkout__input__add" required>
                                </div>
                            </div> --}}
                            
                        </div>


                        <h4>Shipping Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" name="address"  value="{{ old('address') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>State<span>*</span></p>
                                    <select name="state" required>
                                        <option value="">Select</option>
                                        <option value="1">Province 1</option>
                                        <option value="2">Province 2</option>
                                        <option value="3">Bagmati Province</option>
                                        <option value="4">Gandaki</option>
                                        <option value="5">Province 5</option>
                                        <option value="6">Karnali</option>
                                        <option value="7">Sudurpaschim</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>City<span>*</span></p>
                                    <input type="text" name="city" value="{{ old('city') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Postcode / ZIP<span></span></p>
                                    <input type="text" name="zipcode">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Order notes<span></span></p>
                                    <input type="text" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery.">
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        
                        
                        
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total (NRS)</span></div>
                            <ul>
                                <?php $charge = $t_charge = 0; ?>
                                @foreach (Cart::content() as $item)
                                @php
                                    
                                    $ss = App\Product::where('id', $item->model->id)->first();    
                                    $charge = $ss->shipping_charge;
                                    $t_charge+= $charge;
                                @endphp
                                <li>{{ mb_strimwidth($item->model->productName, 0, 22, "..")  }} <span>{{ $item->model->rate . ' x '. $item->qty }}</span></li>
                                <li>(shipping: {{ $charge }} )</li>
                                
                                <input type="hidden" name="product_id[]" value="{{ $item->model->id }}">
                                <input type="hidden" name="rate[]" value="{{ $item->model->rate }}">
                                <input type="hidden" name="supplier_id[]" value="{{ $item->model->user_id }}">
								<input type="hidden" name="quantities[]" value="{{ $item->qty }}">
                                @endforeach
                                
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>NRS. {{ Cart::subtotal() }}</span></div>
                            <div class="checkout__order__subtotal">Shipping <span>NRS. {{ $t_charge }}</span></div>
                            <div class="checkout__order__total">Total <span>NRS. {{ Cart::subtotal()}}</span></div>
                            
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Cash On Delivery
                                    <input type="checkbox" name="cash_on_delivery" value="1" id="payment" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            {{-- <div class="checkout__input__checkbox">
                                <label for="esewa">
                                    eSewa
                                    <input type="checkbox" id="esewa">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            @if(Auth::user())
                            <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                            <input type="hidden" name="orderedBy" value="{{ Auth::user()->id }}">
                            @else
                            <input type="hidden" name="username" value="Guest">
                            <input type="hidden" name="orderedBy" value="">
                            @endif

                                {{-- <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                                <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}"> --}}

                           
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                            {{-- <input type="submit" name="btnsub" value="PLACE ORDER" class="site-btn"> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection
