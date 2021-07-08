@extends('layouts.master')
@section('content')
<div class="container" style="padding: 25px 15px">
    <h4>Admin Panel</h4>
    <div class="row">
        <div class="col-md-3">
            {{-- @if(Auth::user()->hasRoles('admin')){
                @include('admin.sidebar')
            @else
                @include('partials.adminsidebar')
            @endif --}}
        
        </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <strong>Manage Categories:</strong>
                    <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Parent Category</th>
                                        <th>Featured</th>
                                        <th>Edit</th>
                                        <th>Cover</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($categories as $cat)
                                    <tr>
                                        <td>{{ $k }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->parentId ? $cat->parent() : '-' }}</td>
                                        <td>
                                            {!! $cat->featured ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>' !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-danger">Edit</a>
                                        </td>
                                        <td>
                                            <img src="{{ asset( $cat->image ) }}" width="60" height="60" alt="">
                                        </td>
                                        {{-- <td>{{ $cat->products()->count() }}</td> --}}
                                    </tr>
                                @php
                                    $k++;
                                @endphp

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
