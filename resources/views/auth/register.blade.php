@extends('auth.layoutsregis')
@section('content')

    <title>Register | Adz-Dzikra</title>
    <link rel="stylesheet" href="real.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/adzdzikra.png">
    </head>

    <body>

        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-2" style="background-image: url('masuk/images/anak1.png');"></div>
            <div class="contents order-2 order-md-1">

                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="mb-2">
                                <h3>Register</h3>
                                <p class="mb-4">Selamat datang masukkan data anda dengan benar</p>
                            </div>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input name="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        aria-describedby="usename" required autocomplete="username"
                                        value="{{ old('username') }}" placeholder="Username" autofocus
                                        style="font-size: 12px">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="Nama Lengkap Wali" required autocomplete="name"
                                        autofocus style="font-size: 12px">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Email Wali Santri"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        style="font-size: 12px" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror form-control-user"
                                            id="id_password" required autocomplete="current-password" placeholder="Password"
                                            style="font-size: 12px">
                                        <div class="input-group-append">
                                            <span id="togglePassword" class="input-group-text toggle-eye"
                                                style="background-color: transparent; border: none;">
                                                <i class="far fa-eye" style="color: #999999;"></i>
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
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Konfirmasi Password" required
                                            autocomplete="new-password" style="font-size: 12px">
                                        <div class="input-group-append">
                                            <span id="togglePasswordConfirm" class="input-group-text toggle-eye"
                                                style="background-color: transparent; border: none;">
                                                <i class="far fa-eye" style="color: #999999;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Saya setuju untuk
                                            register dengan ketentuan privacy policy</span>
                                        <input type="checkbox" checked="checked" required />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <input type="submit" value="Register" class="btn btn-block btn-primary"
                                    style="margin-top: -30px;">
                                </a>
                                <br>
                                <p>Back to <a href="{{ route('login') }}" class="regis"> <span>Login</span> </a></p>
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
