<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Reset Password</title>
</head>

<body class="bg-image bg-parallax" id="myDiv" onload="myFunction()" style="background: url({{asset('auth-images/5.jpg')}}); background-size: cover;" >
<div class="container">
    <div class="row">

        <div id="img" class="col-md-6">
            <h1 class="rotated text-light">Reset Password</h1>
            <a href="/register" style="text-decoration: none" class="text-light">Create a new account</a>
        </div>

        <div id="reset-form" class="col-md-6">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
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
                <button type="submit" class="btn btn-block btn-outline-light">Reset password</button>
            </form>
        </div>
    </div>

</div>
<div id="loader"></div>
<script>
    var myVar;
    function myFunction() {
        myVar = setTimeout(showPage, 200);
    }
    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
</body>
</html>