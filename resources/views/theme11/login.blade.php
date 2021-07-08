@extends('theme11.layouts.main')

@section('head')
    @include('theme11.layouts.head')
@endsection

{{-- @section('hero_main')
    @include('theme11.layouts.hero_main')
@endsection --}}
    
@section('hero')
    @include('theme11.layouts.hero')
@endsection

<style>
    .hero{
        padding-bottom: unset !important;
    }
    .terms{
      border: 1px solid lightgrey;
      height: 500px;
      overflow-y: scroll;
      padding: 30px;
      background-color: white;
      width: 68%;
      font-size: 13px;
  }
  .login-details{
    background-color: #eae8e6;
    padding: 12px 78px;
    border-top: 2px solid green;
    margin: 12px 0;
  }
  .signup-details{
    background-color: #eae8e6;
    padding: 12px 78px;
    border-top: 2px solid green;
    margin: 12px 0;
  }
  </style>
@section('content')
   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" data-setbg="{{ asset('themes/11/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                <h2>{{ $title }}</h2>
                    <div class="breadcrumb__option">
                    <a href="{{ url('/theme11') }}">Home</a>
                        <span>{{ $title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="login-form">
    <div class="container">
        <div class="row">
            {{-- display errors --}}
        @if ($errors->has('email') || $errors->has('password'))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
        @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
        @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif

            <div class="offset-md-3 col-md-6 col-sm-12 offset-md-3 mt-4">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li role="pill" class="active" data-toggle="pill"><a href="#login_tab" class="btn btn-primary" role="tab" data-toggle="tab">Login</a></li>
                    <li role="pill" data-toggle="tab"><a href="#signup_tab" class="btn btn-secondary ml-3" role="pill" data-toggle="tab">Signup</a></li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane active fadeIn login-details" id="login_tab" data-wow-duration="2s" data-wow-delay="0s">
                        <form method="POST" id="checkout-form" class="clearfix" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            {{csrf_field()}}
                            <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="login-detailss" >
                                    {{-- <p>Create Account ? <a href="#">Signup</a></p> --}}
                                    <div class="section-title-main">
                                        <h3 class="title">Login</h3>
                                    </div>
            
                                    <div class="form-group">
                                        <input class="input form-control" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email"><br>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control" type="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password"><br>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="login" value="LOGIN">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </form>

                        <div class="regi">
                            <a href="{{ route('password.request') }}">Forget Password?</a>
                            {{-- <p>No Account?</p> --}}
                            {{-- <button href="" role="button" class="btn btn-secondary" id="ssignup_tab">Register</button> --}}
                        </div>

                    </div>

                    <div class="tab-pane signup-details" id="signup_tab">
                        <div class="tab-pane active" id="signup_tab">
                            <form method="POST" id="signin-form" class="clearfix" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                {{csrf_field()}}
                                <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="signup-detailss">
                                        {{-- <p>Create Account ? <a href="#">Signup</a></p> --}}
                                        <div class="section-title-main">
                                            <h3 class="title">Signup</h3>
                                        </div>
                
                                        <div class="form-group">
                                            <input type="text" class="{{ $errors->has('firstName') ? ' is-invalid' : '' }} input form-control" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="middleName" class="input  form-control" placeholder="Middle Name" value="{{ old('middleName') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="{{ $errors->has('lastName') ? ' is-invalid' : '' }} input  form-control" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }} input form-control" name="username" placeholder="Username" value="{{ old('username') }}">
									
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} input form-control" class="input" name="password" placeholder="Password"><br>
									
                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" name="password_confirmation" class="input form-control" placeholder="Confirm Password"><br>

                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} input form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" value="{{ old('email') }}"><br>
									
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="{{ $errors->has('streetAddress') ? ' is-invalid' : '' }} input form-control" name="streetAddress" placeholder="Street Address" value="{{ old('streetAddress') }}">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="{{ $errors->has('city') ? ' is-invalid' : '' }} input form-control" name="city" placeholder="City" value="{{ old('city') }}">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }} input form-control" name="phoneNumber" placeholder="Phone Number" value="{{ old('phoneNumber') }}">

                                        </div>
                                        <div class="form-group">
                                            <div class="row" style="padding: 20px;">
                                                <div class="col-md-8 col-sm-12 offset-md-2 terms">
                                                    @component('components.terms')
                                                    @endcomponent
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="terms" required>&nbsp;&nbsp;I accept the above Terms and Conditions<br>
                                  
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="supplier" value="1">&nbsp;I am a Whole Seller<br>
                                            <small>Check this only if you are the whole-seller personnel.</small>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="login" value="Register" class="btn btn-primary">
								
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
            </div>
        


        </div>
    </div>
</section>



@endsection
