@extends('layouts.master')
@section('title', 'Sign in')
@section('yield')
    <body class="bg-image bg-parallax" id="myDiv" onload="myFunction()" style="background: url({{asset('auth-images/9.jpg')}}); background-size: cover;" >
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="row">
            <div id="login-form" class="col-md-6" style="z-index: 0">
                <form action="{{route('login')}}" method="post">
                    {{ csrf_field() }}
                    <i class="fa fa-user-circle mb-3" style="font-size: 10em; color: bisque"></i>
                    <div class="form-group">
                        <label for="email"></label>
                        <input id="email" name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-outline-light btn-block">Sign in</button>
                    <a href="{{ route('password.request') }}" style="text-decoration: none;" class="text-light">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </form>
            </div>
            <div id="img" class="col-md-6 d-sm-flex-none">
                <h1 class="rotated text-light">Sign In</h1>
                <a href="/register" style="text-decoration: none" class="text-light">Create a new account</a>

            </div>
        </div>
        <div id="loader"></div>

    </div>
@endsection