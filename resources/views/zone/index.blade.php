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
            {{-- @include('admin.sidebar') --}}
        </div>
        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                    <strong>Manage Delivery Areas:</strong>
                    <a href="{{ route('zone.create') }}" class="btn btn-info btn-sm">Add New <i class="fa fa-plus"></i></a>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Province</th>
                                        <th>Zone</th>
                                        <th>District</th>
                                        <th>Area</th>
                                        <th>Edit</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($zone as $zz)
                                    <tr>
                                        <td>{{ $zz->province }}</td>
                                        <td>{{ $zz->zone }}</td>
                                        <td>{{ $zz->district }}</td>
                                        <td>{{ $zz->headquarter }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-danger">Edit</a>
                                        </td>
                                        <td></td>
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
