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
            <div class="form-group registration_group">
              <select name="role" class="form-control" id="user_type" onchange="showCompanyFields()" required="">
                <option value="" disabled="" selected="">Select your position</option>
                <option value="student">Student</option>
                <option value="company">Company</option>
                <option value="teacher">Teahcer</option>
              </select>
            </div>
            @php 
                use App\Models\Faculty;
                $faculties = Faculty::all();
            @endphp
            <div class="form-group registration_group">
              <select name="faculty_id" class="form-control" id="user_faculty" onchange="">
                <option value="" disabled="" selected="">Select your faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
              </select>
            </div>
  
            <div class="form_column registration_column">
              <div class="form-group inline registration_group" style="margin-right: 5px;">
                <input id="email_input" type="email" class="form-control" placeholder="Enter email" name="email" required="" onchange="addEmailPattern()">
                @error('email')
                    <span class="" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
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
            <input class="form-control-file" name="avatar" id="actual-btn" type="file" hidden="" required>
            <div class="choose_btn registration_choose_btn">
              <!-- our custom upload button -->
              <label for="actual-btn">Choose Picture</label>
              <!-- name of file chosen -->
              <span id="file-chosen">No Picture chosen</span>
            </div>

            <div id="company_profile" onload="hideCompanyProfile()">
                <h3 style="color: white">Company profile</h3>
    
                <div class="form_column registration_column">
                    <div class="form-group inline registration_group" style="margin-right: 5px;">
                        <input type="text" class="form-control" placeholder="Enter company name" name="company_name" id="company_name">
                    </div>
                    <div class="form-group inline registration_group" style="margin-right: 5px;">
                        <input type="text" class="form-control" placeholder="Enter company address" name="company_address" id="company_address">
                    </div>
                    <div class="form-group inline registration_group" style="margin-right: 5px;">
                        <label for="" style="color: white">Enter company description</label>
                        <textarea type="text" class="form-control" value="Enter company description" name="company_description" id="company_description">
                        </textarea>
                    </div>
        
                    <!-- <input type="file" class="form-control-file" name="picture"> -->
                    <input class="form-control-file" name="company_avatar" id="company_avatar" type="file" hidden="">
                    <div class="choose_btn registration_choose_btn">
                        <!-- our custom upload button -->
                        <label for="company_avatar">Choose company logo</label>
                        <!-- name of file chosen -->
                        <span id="file-chosen_co">No Picture chosen</span>
                    </div>
                </div>
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
    <script>
        window.onload = function() {
            document.getElementById("company_profile").style.display = "none";
            document.getElementById("user_faculty").required = true;
        };
        function showCompanyFields() {
            document.getElementById("user_faculty").style.display = "none";
            document.getElementById("user_faculty").required = false;

            optionVal = document.getElementById("user_type").value;
            var email = document.getElementById('email_input');
            var co_name = document.getElementById('company_name');
            var co_address = document.getElementById('company_address');
            var co_description = document.getElementById('company_description');
            var co_avatar = document.getElementById('company_avatar');

            email.removeAttribute('pattern');
            email.removeAttribute('title');

            co_name.removeAttribute('required');
            co_address.removeAttribute('required');
            co_description.removeAttribute('required');
            co_avatar.removeAttribute('required');
            

            if (optionVal == "company") {
                document.getElementById("company_profile").style.display = "block";
                co_name.setAttribute('required', '');
                co_address.setAttribute('required', '');
                co_description.setAttribute('required', '');
                co_avatar.setAttribute('required', '');
            } else if (optionVal == "student") {
                email.setAttribute('pattern', "\\d{9}@stu\\.sdu\\.edu\\.kz");
                email.setAttribute('title', 'Please use your student email (Ex. 200103022@stu.sdu.edu.kz)')
                
                document.getElementById("user_faculty").required = true;
                document.getElementById("user_faculty").style.display = "";
                document.getElementById("company_profile").style.display = "none";
            } else {
              document.getElementById("user_faculty").required = true;
              document.getElementById("user_faculty").style.display = "";
                document.getElementById("company_profile").style.display = "none";
            }
        }
        
        function addEmailPattern() {
            
        }
    </script>
</body>
</html>