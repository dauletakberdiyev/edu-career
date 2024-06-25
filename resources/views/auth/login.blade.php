<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
        background-color: #2D3270;
        color: #ffffff;
        font-family: 'Roboto', sans-serif;
    }
    .container {
        max-width: 400px;
        padding: 20px;
        margin-top: 100px;
    }
    .form {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #ffffff;
    }

    .form-control::placeholder {
        color: #ffffff;
        opacity: 1; /* full opacity for consistency across browsers */
    }
    .btn-outline-info {
        border-color: #ffffff;
        color: #ffffff;
    }
    .btn-outline-info:hover {
        background-color: #ffffff;
        color: #2D3270;
    }
    .invalid-feedback {
        color: #FF6347; /* Tomato color for errors */
    }
    .reset__link {
        color: #ffffff;
    }
    .reset__link:hover {
        color: #ddd;
        text-decoration: none;
    }
  </style>
</head>
<body style="background-image: url('{{ asset('images/login/background-login.png') }}'); background-size: cover;">
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login__page" style="background-color: rgba(45, 50, 112, 0.8);">
      <form class="form container p-4 rounded" method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="form__title mb-3">Login</h1>

        <div class="form-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @if (Route::has('password.request'))
            <div class="form-group mb-3">
            <a class="reset__link" href="{{ route('password.request') }}">Forgot password?</a>
            </div>
        @endif

        <div class="form-group mb-3">
          <button type="submit" class="btn btn-outline-info">Login</button>
        </div>

        <div class="form-group text-center">
          <a class="reset__link" href="{{ route('register') }}">Don't have an account? Sign up</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
