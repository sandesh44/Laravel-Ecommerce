@extends('theme11.layouts.main')

@section('head')
    @include('theme11.layouts.head')
@endsection

<style>
    @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .404_image img{
      height: 200px;
  }
}
</style>
@section('content')
    

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-8 col-sm-12 404_image" >
                <a href="{{ url('/') }}"><img src="{{ asset('themes/11/img/404_page.jpg') }}" width="650" height="400" alt=""></a>
       
            </div>
         </div>
    </div>
@endsection



