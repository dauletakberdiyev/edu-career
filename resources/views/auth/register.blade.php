<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
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
        <div class="login__block registration__block">
          <form  method="POST" action="{{ route('user.add') }}" enctype="multipart/form-data">
            @csrf
            <h1 class="form__title">Sign up</h1>
            <input type="hidden" name="login" value="1">
            <div>
            <div class="form-group registration_group">
              <select name="role" class="form-control" id="user_type" onchange="var optionVal = $(this).find(':selected').val(); doSomething(optionVal)" required="">
                <option value="" disabled="" selected="">Select your position</option>
                <option value="student">Student</option>
                <option value="company">Company</option>
                <option value="coordinator">Coordinator</option>
              </select>
            </div>
            @php 
                use App\Models\Faculty;
                $faculties = Faculty::all();
            @endphp
            <div class="form-group registration_group">
              <select name="faculty_id" class="form-control" id="user_type" onchange="var optionVal = $(this).find(':selected').val(); doSomething(optionVal)" required="">
                <option value="" disabled="" selected="">Select your faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
              </select>
            </div>
  
            <div class="form_column registration_column">
              <div class="form-group inline registration_group" style="margin-right: 5px;">
                <input type="email" class="form-control" placeholder="Enter email" name="email" required="">
              </div>
              <div class="form-group inline registration_group">
                <input type="password" class="form-control" placeholder="Enter password" name="password" required="">
              </div>
              <div class="form-group inline registration_group" style="margin-right: 5px;">
                <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required="">
              </div>
              <div class="form-group inline registration_group">
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" required="">
              </div>
              <div class="form-group inline registration_group" id="gender">
                <select name="gender" class="form-control">
                  <option value="" disabled="" selected="">Your gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                </div>
            </div>
  
            <!-- <input type="file" class="form-control-file" name="picture"> -->
            <input class="form-control-file" name="avatar" id="actual-btn" type="file" hidden="">
            <div class="choose_btn registration_choose_btn">
              <!-- our custom upload button -->
              <label for="actual-btn">Choose Picture</label>
              <!-- name of file chosen -->
              <span id="file-chosen">No Picture chosen</span>
            </div>
  
            <div class="form-group">
              <button type="submit" class="btn btn-outline-info login-btn">Sign up</button>
            </div>
            <div class="form-group">
              <a class="reset__link" href="{{ route('login') }}">Already have an account? Login</a>
            </div>
          </form>
        </div>
  
      </div>
  
      <img src="{{ asset('/images/login/background-login.png') }}" alt="background-image" class="bg-img">
  
    </div>
  </div>
</body>
</html>