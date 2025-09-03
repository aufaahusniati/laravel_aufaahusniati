<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .login-image-container {
                background: url("{{ asset('login.jpg') }}") center center no-repeat;
                background-size: cover;
                height: 100vh;
            }

            @media (max-width: 767px) {
                .login-image-container {
                    display: none;
                }
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 p-0 login-image-container d-none d-md-block"></div>
                <div class="col-md-6 d-flex align-items-center justify-content-center vh-100">
                    <div class="col-md-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-5">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold">Selamat Datang!</h3>
                                    <p class="text-muted">Silakan masuk untuk melanjutkan</p>
                                </div>

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ url('/login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" required autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>