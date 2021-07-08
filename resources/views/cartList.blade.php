@extends('layouts.master')
@section('content')
@include('sweet::alert')
<!-- BREADCRUMB -->
<div id="breadcrumb">
<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Cart</li>
    </ul>
</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="order-summary clearfix">
                <div class="section-title-main">
                    <h3 class="title">Order Review</h3>
                </div>
                <table class="shopping-cart-table table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th class="text-center" >Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                           <tr>
                            <th class="text-right"><img src="{{ asset( 'uploads/products/'.$item->featuredImage ) }}" alt="" width="50px" height="50px"></th>
                            <th class="text-center">{{$item->productName}}</th>
                            <th class="text-center">{{$item->rate}}</th>
                            <th class="text-center">{{$item->quantity}}</th>
                            <th class="text-center">{{$item->rate * $item->quantity}}</th>
                            <th class="text-left"><a href="/removecart/{{$item->cart_id}}"><i class="fas fa-times"></i></a></th>
                           </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>SUBTOTAL</th>
                            <th colspan="2" class="sub-total">
                             @php
                                  $total = 0;
                                foreach ($products as $item) {
                                 $total += $item->quantity *$item->rate ;
                                }
                                echo $total;
                             @endphp
                        </tr>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>SHIPING</th>
                            <td colspan="2">Free Shipping</td>
                        </tr>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>You Save</th>
                            <td colspan="2">NRs. 50/-</td>
                        </tr>
                        <tr>
                            <th class="empty" colspan="3"></th>
                            <th>TOTAL</th>
                            <th colspan="2" class="total">NRs. 
                            @php
                                $total = 0;
                              foreach ($products as $item) {
                                   $total +=$item->rate *$item->quantity;  
                              }
                              echo $total;
                           @endphp</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="pull-right">
                <a class="primary-btn" href="{{route('layouts.app')}}">Continue Shopping</a>
                <a class="primary-btn" href="http://encoderslab.com/iPasal/theme8/show-checkout">Place Order</a>
                </div>
            </div>

        </div>
    </div>
</div>
</div>        
@endsection