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
                    <strong>Update Slider:</strong>
                </div>
                @include('errors.errors')
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            
                        <form action="{{ route('sliders.update', $slider->sliderId) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label>Main Text</label>
                                <textarea name="textMain" rows="3" class="form-control">{{ $slider->textMain }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Secondary Text</label>
                                <input type="text" name="textSecondary" class="form-control" value="{{ $slider->textSecondary }}">
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Update Slider Image: <b><small> Min. Image Size: 520 by 460 px )</small></b></label>
                                        <input type="file" name="sliderImage" id="file_slider" class="form-control">
                                        <p class="slider-error" style="color: blue;"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset( 'uploads/sliders/resized/'.$slider->sliderImage ) }}" width="80" height="50" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Select Category</label>
                                        <select name="category" class="form-control">
                                        @foreach ( $categories as $category )
                                            <option value="{{ $category->id }}" {{ $category->id == $slider->categoryId ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Show or Hide Slider</label><br>
                                        <input type="radio" name="showSlider" value="1" {{ $slider->showSlider ? 'checked' : '' }}>&nbsp;Show
                                        <input type="radio" name="showSlider" value="0" {{ !$slider->showSlider ? 'checked' : '' }}>&nbsp;Hide
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Update Slider" class="btn btn-info">    
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

@endsection
