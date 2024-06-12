<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #2D3270;
      color: white;
      font-family: 'Roboto', sans-serif;
    }
    .login__page {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }
    .login-inner {
      background: rgba(255, 255, 255, 0.1);
      padding: 20px;
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
    }
    .form-control {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      color: white;
    }
    .form-control::placeholder {
      color: white;
      opacity: 1;
    }
    .btn-outline-info {
      border-color: white;
      color: white;
    }
    .btn-outline-info:hover {
      background-color: white;
      color: #2D3270;
    }
    .reset__link {
      color: white;
      text-decoration: none;
    }
    .reset__link:hover {
      color: #ddd;
    }
    .form__title {
      text-align: center;
      margin-bottom: 20px;
    }
    .bg-img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      opacity: 0.3;
    }
  </style>
</head>
<body>
  <div id="app" class="login__page">
    <div class="login-inner">
      <div class="login__block">
        <form class="form" method="POST" action="{{ route('password.email') }}">
          @csrf
          <h1 class="form__title">{{ __('Reset Password') }}</h1>
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <div class="form-group mb-2">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
              <div class="invalid-feedback">
                  <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <div class="form-group mb-5">
            <button type="submit" class="btn btn-outline-info login-btn">{{ __('Send Password Reset Link') }}</button>
          </div>

          <div class="form-group text-center">
            <a class="reset__link" href="{{ route('login') }}">Already have an account?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
