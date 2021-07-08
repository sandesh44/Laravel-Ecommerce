@extends('layouts.master')
@section('content')
<div class="container" style="padding: 25px 15px">
    <h4>Admin Panel</h4>
    <div class="row">
        <div class="col-md-3">
            {{-- @include('admin.sidebar') --}}
        </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <strong>Create a Tag:</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            @include('errors.errors')
                            <form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Name*:</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <div class="form-group">
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
