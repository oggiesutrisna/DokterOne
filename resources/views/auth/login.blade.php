<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faskesku</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>
    <div class="b-example-divider"></div>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-2">Faskes Unicare</h1>
                <p class="col-lg-10 fs-3">You Should Login to use this app. :) </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form method="POST" action="{{ route('login') }}" class="p-4 p-md-5 border rounded-3 bg-light">
                    @csrf
                    <label for="floatingInput">Email</label>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="floatingPassword">Password</label>
                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control" @error('password') is invalid
                            @enderror name="password" id="floatingPassword" placeholder="Password">
                    </div>
                    <div class="checkbox mb-3">
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
