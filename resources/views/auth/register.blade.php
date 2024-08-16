<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name', 'Laravel') }} | Auth Session</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h2"><b>Smart invoice</b> Processing</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register below</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <x-input-error :messages="$errors->get('email')" class="text-danger text-center mb-2" />
                    <div class="input-group mb-3">
                        <input class="form-control" placeholder="Enter your E-mail Address" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>


                    <x-input-error :messages="$errors->get('name')" class="text-danger text-center mb-2" />
                    <div class="input-group mb-3">
                        <input class="form-control" placeholder="Full name" type="text" name="name"
                            :value="old('name')" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="text-danger text-center mb-2" />
                    <div class="input-group mb-3">
                        <input class="form-control" placeholder="Enter Password" type="password" name="password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger text-center mb-2" />
                    <div class="input-group mb-3">
                        <input class="form-control" placeholder="Enter Password Again" type="password"
                            name="password_confirmation" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" required>
                                <label for="remember">
                                    Agree to terms and condition
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-blocks">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="{{ route('login') }}" class="btn btn-block btn-success">
                        <i class="fab fa-home mr-2"></i> Login to Existing account
                    </a>
                </div>
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/') }}/assets/dist/js/adminlte.min.js"></script>
</body>

</html>
