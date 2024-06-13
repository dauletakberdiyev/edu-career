<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
        background-color: #2D3270;
        color: #ffffff;
        font-family: 'Roboto', sans-serif;
    }
    .container {
        max-width: 600px;
        padding: 20px;
        margin-top: 50px;
    }
    .form {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 20px;
    }
    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #ffffff;
    }
    .form-control::placeholder {
        color: #ffffff;
        opacity: 1;
    }
    .form-group label {
        color: whitesmoke; /* Makes the text color white */
        display: block; /* Ensures the label appears on a new line, above the input */
        margin-bottom: 5px; /* Adds space between the label and the input */
    }
    .form-control-file {
        display: block;
        width: 100%; /* Makes the input take the full width of its container */
    }
    .btn-outline-info {
        border-color: #ffffff;
        color: #ffffff;
    }
    .btn-outline-info:hover {
        background-color: #ffffff;
        color: #2D3270;
    }
    .reset__link, .reset__link:visited {
        color: #ffffff;
        text-decoration: none;
    }
    .reset__link:hover {
        color: #ddd;
    }
    .hidden {
        display: none;
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login__page">
      <form class="form container rounded" method="POST" action="{{ route('user.add') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="form__title mb-4">Sign up</h1>

        <div class="form-group mb-3">
          <select name="role" class="form-control" id="user_type" onchange="showCompanyFields()" required="">
            <option value="" disabled selected>Select your position</option>
            <option value="student">Student</option>
            <option value="company">Company</option>
          </select>
        </div>

        <div class="form-group mb-3" id="faculty_select">
          <select name="faculty_id" class="form-control" id="user_faculty">
            <option value="" disabled selected>Select your faculty</option>
            @foreach(App\Models\Faculty::all() as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group mb-3">
          <input type="email" class="form-control" id="email_input" placeholder="Enter email" name="email" required onchange="addEmailPattern()">
        </div>

        <div class="form-group mb-3">
          <input type="password" class="form-control" placeholder="Enter password" name="password" required>
        </div>

        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" required>
        </div>

        <div class="form-group mb-3">
          <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" required>
        </div>

        <div class="form-group mb-3">
          <select name="gender" class="form-control">
            <option value="" disabled selected>Your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>


        <div class="form-group mb-3">
          <a href="{{ asset('docs/cv_template.pdf') }}" target='_blank' class="">Download CV template</a>
        </div>

        <div class="form-group mb-3 hidden" id="student_cv">
          <label>Upload your CV</label>
          <input type="file" name="cv" accept="pdf,doc,docx" class="form-control-file">
        </div>

        <div class="form-group mb-3">
          <label>Upload your photo</label>
          <input type="file" name="avatar" required class="form-control-file">
        </div>

        <div id="company_profile" class="hidden">
          <h3 style="color: white">Company profile</h3>
          <div class="form-group mb-3">
            <input type="text" class="form-control" placeholder="Enter company name" name="company_name" id="company_name">
          </div>
          <div class="form-group mb-3">
            <select name="type" class="form-control" required>
              <option value="" disabled selected>Select company type</option>
              <option value="Company in other industry">Company in other industry</option>
              <option value="Educational Organization">Educational Organization</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" placeholder="Enter company address" name="company_address" id="company_address">
          </div>
          <div class="form-group mb-3">
            <textarea class="form-control" placeholder="Company description (max 100 words)" name="company_description" id="company_description" rows="3"></textarea>
          </div>
          <div class="form-group mb-3">
            <input type="text" class="form-control" placeholder="Instagram profile link" name="instagram" id="instagram">
          </div>
          <div class="form-group mb-3">
            <label>Legal registration</label>
            <input type="file" name="registration_certificate" class="form-control-file">
          </div>
          <div class="form-group mb-3">
            <label>Lease contract</label>
            <input type="file" name="lease_contract" class="form-control-file">
          </div>
          <div class="form-group mb-3">
            <label>Optional company photo</label>
            <input type="file" name="company_avatar" id="company_avatar" class="form-control-file">
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-outline-info">Sign up</button>
        </div>

        <div class="form-group text-center">
          <a class="reset__link" href="{{ route('login') }}">Already have an account? Login</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    function showCompanyFields() {
        var userType = document.getElementById("user_type").value;
        var companyProfile = document.getElementById("company_profile");
        var studentCV = document.getElementById("student_cv");
        var facultySelect = document.getElementById("faculty_select");

        if (userType === "company") {
            companyProfile.classList.remove('hidden');
            studentCV.classList.add('hidden');
            facultySelect.classList.add('hidden');
        } else if (userType === "student") {
            companyProfile.classList.add('hidden');
            studentCV.classList.remove('hidden');
            facultySelect.classList.remove('hidden');
        }
    }

    function addEmailPattern() {
      var emailInput = document.getElementById("email_input");
      var userType = document.getElementById("user_type").value;
      if (userType === "student") {
        emailInput.setAttribute('pattern', '\\d{9}@stu\\.sdu\\.edu\\.kz');
        emailInput.setAttribute('title', 'Please use your student email (Ex. 200103022@stu.sdu.edu.kz)');
      } else {
        emailInput.removeAttribute('pattern');
        emailInput.removeAttribute('title');
      }
    }
  </script>
</body>
</html>
