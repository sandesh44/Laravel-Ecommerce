{{-- @extends('layouts.master')
@section('content') --}}
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
                    <strong>Create New Slider:</strong>
                </div>
                @include('errors.errors')
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Main Text</label>
                                <textarea name="textMain" rows="3" class="form-control">{{ old('textMain') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Secondary Text</label>
                                <input type="text" name="textSecondary" class="form-control" value="{{ old('textSecondary') }}">
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Slider Image</label>
                                        <input type="file" name="sliderImage" id="file_slider" class="form-control">
                                        <p class="slider-error" style="color: blue;"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Category</label>
                                        <select name="category" class="form-control">
                                        @foreach ( $categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <input type="submit" name="submit" value="Create Slider" class="btn btn-info">    
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

<script>
    $(document).ready(function(){
    // validation for slider image
    var _URL = window.URL || window.webkitURL;
                $("#file_slider").change(function (e) {
                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        var objectUrl = _URL.createObjectURL(file);
                        img.onload = function () {
                            // alert(this.width + " " + this.height);
                if(this.width >= 520 || this.height >= 460){
                  // alert('success');
                  $(':input[type="submit"]').prop('disabled', false);
                  $(".slider-error").empty();
                }else{
                  // alert('Failure');
                  $(".slider-error").text("Image Size Too Small. Please Upload Larger Image.");
                  $(':input[type="submit"]').prop('disabled', true);
                }
                            _URL.revokeObjectURL(objectUrl);
                        };
                        img.src = objectUrl;
                    }
                });
    });
    </script>
{{-- @endsection --}}
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>