@extends('auth.layoutsregis')
@section('content')

    <title>Login | Adz-Dzikra</title>
    <link rel="stylesheet" href="real.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/adzdzikra.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous">
    </head>

    <body>

        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-1" style="background-image: url('masuk/images/login.png');"></div>
            <div class="contents order-2 order-md-1">

                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="mb-2">
                                <h3>Login</h3>
                                <p class="mb-4">Selamat Datang silahkan Login</p>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                    </div>
                                @endif
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            aria-describedby="emailHelp" required autocomplete="email"
                                            value="{{ old('email') }}" placeholder="Email" autofocus
                                            style="font-size: 12px">
                                        
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror form-control-user"
                                                id="id_password" required autocomplete="current-password"
                                                placeholder="Password" style="font-size: 12px">
                                            <div class="input-group-append">
                                                <span id="togglePassword" class="password-eye"
                                                    style="vertical-align: middle; display: flex; align-items: center;">
                                                    <i class="far fa-eye" style="margin-top: 2px; color: #999999;"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <input type="submit" value="Login" class="btn btn-block btn-primary">
                                    </a>
                                    <span style="font-size: 11; margin: 33%">Forgot password? <a
                                            href="{{ route('password.reset') }}">Reset</a></span>
                                    <br><br>
                                    <div class="signin">
                                        <span style="margin-left: 15%">You don't have an account? <a
                                                href="{{ route('register') }}">Register</a></span><br>
                                        <span style="margin: 47%">Or </span><br> <span style="margin-left: 39%">Go To <a
                                                href="/">Home</a></span><br>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="masuk/js/jquery-3.3.1.min.js"></script>
        <script src="masuk/js/popper.min.js"></script>
        <script src="masuk/js/bootstrap.min.js"></script>
        <script src="masuk/js/main.js"></script>
    </body>

    </html>
