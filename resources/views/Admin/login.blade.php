@extends('layouts.adminMaster')
@section('adminContent')

    <div class="container">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="/login">
                            {{ csrf_field() }}
                            <fieldset>
                                <input id="email" name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="E-mail">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                     </span>
                                @endif
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input id="password" type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection