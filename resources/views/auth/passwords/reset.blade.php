<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #2D3270;
      color: white;
      font-family: 'Roboto', sans-serif;
    }
    .login__page, .form {
      background: rgba(255, 255, 255, 0.1);
      padding: 20px;
      border-radius: 10px;
    }
    .form-control {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      color: white;
    }
    .form-control::placeholder {
      color: white;
    }
    .btn-outline-info {
      border-color: white;
      color: white;
    }
    .btn-outline-info:hover {
      background-color: white;
      color: #2D3270;
    }
    .reset__link, .reset__link:visited {
      color: white;
      text-decoration: none;
    }
    .reset__link:hover {
      color: #ddd;
    }
    label {
      color: white; /* Ensures the labels are white */
    }
  </style>
</head>
<body>
  <div id="app" class="d-flex justify-content-center align-items-center vh-100">
    <div class="login__page">
      <div class="login-inner">
        <div class="login__block">
          <form class="form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h1 class="form__title">{{ __('Reset Password') }}</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-outline-info">{{ __('Reset Password') }}</button>
            </div>

            <div class="form-group">
              <a class="reset__link" href="{{ route('login') }}">Already have an account?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
