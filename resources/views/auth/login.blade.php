<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="login__page">
      <div class="login-inner">
        <div class="login__block">
          <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="form__title">Login</h1>
  
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  
            @if (Route::has('password.request'))
                <div class="form-group">
                <a class="reset__link" href="{{ route('password.request') }}">Reset password</a>
                </div>
            @endif
            
  
            <div class="form-group">
              <button type="submit" class="btn btn-outline-info login-btn">Login</button>
            </div>
  
            <div class="form-group">
              <a class="reset__link" href="{{ asset('register') }}">Don't have an account?</a>
            </div>
  
          </form>
        </div>
      </div>
      <img src="{{ asset('images/login/background-login.png') }}" alt="" class="bg-img">
    </div>
  </div>
</body>
</html>