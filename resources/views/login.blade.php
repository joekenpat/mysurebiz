<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mysurebiz - Login</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
</head>
<body>
<div class="w-50 mx-auto mt-3 py-3 d-block d-md-none">
    <img class="img-fluid" src="{{ asset('images/mysurebizlogo.png') }}" alt="">
</div>
<h3 class="text-center mt-4 font-weight-bold">LOGIN</h3>
{{--@if(session('notAdmin'))--}}
    {{--<span class="invalid-feedback text-center d-block" role="alert">--}}
        {{--<strong>{{ session('notAdmin') }}</strong>--}}
    {{--</span>--}}
{{--@endif--}}
@if ($errors->has('message'))
    <span class="invalid-feedback text-center d-block" role="alert">
        <strong>
            {{ $errors->first('message') }}
            @if ($errors->has('resendemail'))
                <br>
                <form action="{{ route('resend-verification') }}" method="post" id="resendEmail">
                    @csrf
                    <input type="text" name="email" value="{{ $errors->first('resendemail') }}" hidden>
                    @if ($errors->has('text'))
                        <span style="color: #5b5d5b;">Did not receive email? </span>
                    @endif
                    <button type="submit" class="btn btn-sm btn-success">Resend email</button>
                </form>
            @endif
        </strong>
    </span>
@endif

{{--Success message for resend email--}}
@if(session('message'))
    <span class="text-success text-center d-block" role="alert">
        <strong>{{ session('message') }}</strong>
    </span>
@endif

<div class="container-fluid">
<div class="row">
    <div class="col-12 col-md-6">

        <div class="row">
            <div class="col-10 col-xl-6 offset-1 offset-xl-3">
                <div class="login-wrapper p-4">
                    <form method="POST" action="{{ route('login') }}" id="adminLogin">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="rememberMe" value="1" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="my-button-green font-weight-bold">login</button>
                        </div>
                    </form>
                    <div class="pt-1">
                        <hr>
                        Do not have an account?
                        <a href="{{ route('reg', ['type' => 'student']) }}" style="color: #f48637;">Register</a>
                    </div>
                    <div class="pt-1">
                        <hr>
                        <a href="{{ route('ebooks') }}" style="color: #f48637;">
                            Visit our Ebook Store today <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 d-none d-md-block">
        <div class="logo w-75 mx-auto mt-3">
            <img class="img-fluid" src="{{ asset('images/mysurebizlogo.png') }}" alt="">
        </div>
    </div>
</div>
</div>

<script src="{{ asset('js/admin-login.js') }} " defer></script>
</body>
</html>