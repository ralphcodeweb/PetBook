<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Shreyu - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/sheruadmin/images/favicon.ico">

        <!-- App css -->
        <link href="/sheruadmin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/sheruadmin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/sheruadmin/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="/">
                                                <img src="/sheruadmin/images/logo-final.png" alt="" height="50" />
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">Bienvenido!</h6>
                                        <p class="text-muted mt-1 mb-4">Ingresa tu email y contraseña para acceder al panel de administración.</p>

                                        <form method="POST" action="{{ route('login') }}" class="authentication-form needs-validation" novalidate>
                                            @csrf

                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-dual" data-feather="mail"></i></span>
                                                    </div>
                                                    <input
                                                        name="email"
                                                        type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email"
                                                        value="{{ old('email') }}"
                                                        placeholder="hello@coderthemes.com"
                                                        required autofocus
                                                    >
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Password</label>
                                                <a href="{{ route('password.request') }}" class="float-right text-muted text-unline-dashed ml-1">{{ __('Forgot Your Password?') }}</a>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-dual" data-feather="lock"></i></span>
                                                    </div>
                                                    <input
                                                        name="password"
                                                        type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password"
                                                        placeholder="Ingresa tu contraseña"
                                                        required
                                                    >
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="remember" type="checkbox" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="checkbox-signin">{{ __('Remember Me') }}</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> Log In</button>
                                            </div>
                                        </form>
                                        {{--
                                        <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">Or</span></div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="" class="btn btn-white"><i class='uil uil-google icon-google mr-2'></i>With Google</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="" class="btn btn-white"><i class='uil uil-facebook mr-2 icon-fb'></i>With Facebook</a>
                                            </div>
                                        </div>
                                        --}}
                                    </div>

                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div class="auth-user-testimonial">
                                                <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                                <p class="lead">"It's a elegent templete. I love it very much!"</p>
                                                <p>- Admin User</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="{{ url('register') }}" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="/sheruadmin/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="/sheruadmin/js/app.min.js"></script>

    </body>
</html>
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
