@extends('layouts.master')
@section('content')
<div class="container" style="padding: 25px 15px">
    <h4>Admin Panel</h4>
    <div class="row">
        <div class="col-md-3">
            
                {{-- @if(Auth::user()->hasRoles('admin')){
                    @include('admin.sidebar') --}}
                    @php
                        $user_theme = 0;
                    @endphp
                {{-- @else
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
                    <strong>Create a Category:</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
                @include('errors.errors')
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Name*:</label>
                                    <input type="text" name="name" value="{{ old('name') }} " class="form-control" >
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Parent Category:</label>
                                            <select name="parentId" class="form-control">
                                                <option value="">None</option>
                                            @foreach ( $categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Featured Image:</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Featured Category?</label>
                                            <select name="featured" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                <input type="hidden" name="theme_no" value="{{ $user_theme }}">
                                    <input type="submit" name="create" value="Create" class="btn btn-primary">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
              </div>
        </div>
        </div>
    </div>
</div>
@endsection
