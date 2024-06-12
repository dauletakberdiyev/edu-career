<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU Career</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2D3270;
            color: #ffffff;
        }
        .navbar {
            background-color: #2D3270;
        }
        .navbar .navbar-brand,
        .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .section {
            background: rgba(255, 255, 255, 0.1);
            margin-top: 20px;
            border-radius: 5px;
            padding: 20px;
        }
        .btn-custom {
            background-color: #ffffff;
            color: #2D3270;
        }
        table {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/header/edu_logo.png') }}" alt="EDU Career Logo" style="height: 120px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#goals">Goals</a>
                <a class="nav-item nav-link" href="#duration">Duration</a>
                <a class="nav-item nav-link" href="#requirements">Requirements</a>
                <a class="nav-item nav-link" href="#grading">Grading</a>
            </div>
            <div class="navbar-nav ml-auto">
                @if (auth()->check())
                    <a class="btn btn-light" style="color: #2D3270;" href="{{ route('home') }}">Dashboard</a>
                @else
                    <a class="btn btn-light mt-2 ml-2" style="color: #2D3270;" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-light mt-2 ml-2" style="color: #2D3270;" href="{{ route('register') }}">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mt-5">
        <div class="jumbotron text-center bg-transparent">
            <h1 class="display-4">Bridging Education and Professional Growth</h1>
            <p class="lead">EDU Career is a special course for fourth year students (or third year students coming after college or NIS) that covers all elective courses of the penultimate semester (the one before last) of a study program.</p>
        </div>

        <!-- Goals Section -->
        <div class="section" id="goals">
            <h2>Our Goals</h2>
            <ul>
                <li>Increase the professional training of future specialists.</li>
                <li>Organize the training process of graduate students in accordance with the needs of employers.</li>
                <li>Strengthen the relationship between education and practice.</li>
            </ul>
        </div>

        <!-- Program Duration and Important Dates -->
        <div class="section" id="duration">
            <h2>Program Duration and Important Dates</h2>
            <p>The duration of EDU Career is 15 weeks during Fall Semester. It starts in September and ends in December.<br>There are six important date periods. They are the following:</p>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Process</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Beginning of May</td>
                        <td>Start for organizations' registration</td>
                    </tr>
                    <tr>
                        <td>After FX exams (end of June)</td>
                        <td>Start for candidates registration</td>
                    </tr>
                      <tr>
                        <td>End of June - End of July For 24-25 academc year: 24.06 - 26.07</td>
                        <td>Application period</td>
                      </tr>
                      <tr>
                        <td>End of July  - Mid of August For 24-25 academc year: 26.07 - 16.08</td>
                        <td>Agreements period</td>
                      </tr>
                      <tr>
                        <td>Mid of August - End of August For 24-25 academc year: 19.08 - 28.08</td>
                        <td>Portal registration</td>
                      </tr>
                      <tr>
                        <td>The first two weeks of internship 1.09 - 13.09</td>
                        <td>ADD/DROP period (only going back to main track at SDU)</td>
                      </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

                <!-- Requirements Section -->
        <div class="section" id="requirements">
            <h2>Requirements for an educational organization</h2>
            <p>There are requirements to any organization to take part in the “EDU Career” program:</p>
            <ul>
                <li>Organization has to be registered as a juridical organization.</li>
                <li>Organization has to possess/rent a building more than 150 m2</li>
                <li>Organization has to have more than 15 full-time teaching employees</li>
                <li>Organization has to have clean tax history</li>
                <li>Organization has not violated obligations regarding the internship in the previous year (mentorship and  workload)</li>
            </ul>
        </div>

        <div class="section" id="requirements">
            <h2>Requirements for a candidate</h2>
            <p>There is a GPA requirement for students who wish to participate in the "EDU Career" program:</p>
            <ul>
                <li>Language Department - equal or more than 3.2</li>
                <li>Natural Sciences Department - equal or more than 3.2</li>
                <li>Humanities Department - equal or more than 3.3</li>
            </ul>
        </div>

        <!-- PGrading -->
        <div class="section" id="grading">
            <h2>Grading Policy</h2>
            <p>
                There are five types of assessment at EDU Career. They are the following:
            </p>
            <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                      <th>Assessment Type</th>
                      <th>Grade</th>
                      <th>Responsible person</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Formative Assessment of Internship</td>
                        <td>40</td>
                        <td>Mentor (әдіскер)</td>
                      </tr>
                      <tr>
                        <td>Internship plan</td>
                        <td>10</td>
                        <td>SDU Supervisor</td>
                      </tr>
                      <tr>
                        <td>Reports (video report, daily week on platform youtube or instagram)</td>
                        <td>15</td>
                        <td>SDU Supervisor</td>
                      </tr>
                      <tr>
                        <td>Project work</td>
                        <td>15</td>
                        <td>Edu Career Coordinator</td>
                      </tr>
                      <tr>
                        <td>Final Presentation</td>
                        <td>20</td>
                        <td>Edu Career Coordinator</td>
                      </tr>
                    </tbody>
            </table>
        </div>

        <!-- Additional sections for Requirements, Grading, etc. can be similarly structured -->
    </div>

    <!-- Include Bootstrap JS and dependencies from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
