@extends('theme11.layouts.main')

@section('head')
    @include('theme11.layouts.head')
@endsection

@section('hero')
    @include('theme11.layouts.hero')
@endsection

<style>
    .hero{
        padding-bottom: unset !important;
    }
</style>
@section('content')
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get("success") }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  @endif

                  @if (Session::has('info'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get("info") }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  @endif

                  <button class="btn btn-primary text-white float-right"><a href="{{ url('/') }}">Continue</a></button>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->




@endsection


