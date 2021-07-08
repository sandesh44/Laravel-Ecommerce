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
                    <strong>Create a Delivery Areas (Zones) :</strong>
                    <small>Inputs with * are required.</small>
                </div>
                <hr>
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-12">
                            @include('errors.errors')
                            <form action="{{ route('zone.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <label>Province*:</label>
                                            <select name="province" class="form-control">
                                                <option value="">Select</option>
                                                <option value="Province 1">Province 1</option>
                                                <option value="Province 2">Province 2</option>
                                                <option value="Province 3">Province 3</option>
                                                <option value="Province 4">Province 4</option>
                                                <option value="Province 5">Province 5</option>
                                                <option value="Province 6">Province 6</option>
                                                <option value="Province 7">Province 7</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <label>Zone</label>
                                            <input type="text" name="zone" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <label>District</label>
                                            <input type="text" name="district" class="form-control">
                                        </div>

                                        <div class="col-md-4 col-12 mt-3">
                                            <label>Region / Area</label>
                                            <input type="text" name="headquarter" placeholder="region or area" class="form-control">
                                        </div>
                                    </div>
                                    
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
{{-- @endsection --}}
