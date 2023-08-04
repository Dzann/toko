<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .login-form {
            max-width: 500px;
            margin: 230px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-login:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input name="email" type="email" id="email" class="form-control" placeholder="Enter your email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password"
                                required>
                            @if (Session::has('status'))
                                <div class=""><span style="color: red">{{ Session::Get('status') }}</span></div>
                            @endif
                        </div>
                        <div class="">
                            <button type="submit" style="width: 100%" class="btn btn-primary btn-block btn-login mt-4">Login</button>
                            <p class="text-center mt-3">Belum Punya Akun? <a href="{{ route('registerPage') }}" class="text-center">Register</a></p>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>
