@extends('layouts.master')
@section('content')
<div class="container" style="padding: 25px 15px">
    <h4>Admin Panel</h4>
    <div class="row">
        <div class="col-md-3">
            {{-- @if(Auth::user()->hasRoles('admin')){
                @include('admin.sidebar')
                @php
                    $user_theme = 0;
                @endphp
            @else
                @include('partials.adminsidebar')
                @php
                    $user_theme = Auth::user()->assign_theme;
                @endphp
            @endif --}}
        </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <strong>Manage Sliders for APP:</strong>
                    <a href="{{ route('carts.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $cartItems as $cartItem )

                                    <tr>
                                        <td>{{ $cartItem->productName }}</td>
                                        <td>{{ $cartItem->quantity }}</td>
                                        <td>{{ $$cartItem->rate }}</td>
                                        <td>
                                            <a href="{{ route('carts.edit', $$cartItem->id) }}" class="btn btn-danger btn-sm">Edit</a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
        </div>
        </div>
    </div>
</div>
@endsection
