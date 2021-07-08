{{-- @extends('layouts.master')
@section('content') --}}
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
                    <a href="{{ route('sliders.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Main Text</th>
                                        <th>Secondary Text</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $sliders as $slider )

                                    <tr>
                                        <td>{{ $slider->textMain }}</td>
                                        <td>{{ $slider->textSecondary }}</td>
                                        <td>
                                            <img src="{{ asset( 'uploads/sliders/resized/'.$slider->sliderImage ) }}" alt="">
                                        </td>
                                        <td>{{ $slider->categoryName }}</td>
                                        <td>{!! $slider->showSlider ? '<i class="fa fa-check"></i>' : '<strong>x</strong>' !!}</td>
                                        <td>
                                            <a href="{{ route('sliders.edit', $slider->sliderId) }}" class="btn btn-danger btn-sm">Edit</a>
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
{{-- @endsection --}}
