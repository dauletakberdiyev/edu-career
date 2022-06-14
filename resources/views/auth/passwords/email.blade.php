<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="login__page">
      <div class="login-inner">
        <div class="login__block">
          <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1 class="form__title">{{ __('Reset Password') }}</h1>
            @if (session('status'))
                <span class="text-success">
                    {{ session('status') }}
                </span>
            @endif
            <div class="form-group">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
  
            <div class="form-group">
              <button type="submit" class="btn btn-outline-info login-btn">{{ __('Send Password Reset Link') }}</button>
            </div>
  
            <div class="form-group">
              <a class="reset__link" href="{{ route('login') }}">Already have an account?</a>
            </div>
  
          </form>
        </div>
      </div>
      <img src="{{ asset('images/login/background-login.png') }}" alt="backgroung-image" class="bg-img">
    </div>
  </div>
</body>
</html>
