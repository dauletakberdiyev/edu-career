@extends('layouts.app')

@section('content')
<!-- Main -->
<main class="main">
        <div class="container-fluid">
          <div class="main__inner">
            <h3 class="main__title">General information</h3>
            <div class="row information__blocks">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-4 information__block">
                <div class="information__top">
                  <span class="information__title text-warning">IMPORTANT</span>
                </div>
                <p class="information__subtitle">
                  <span class="text-info">
                  @role('student|admin|cordinator')
                  Do not forget to upload your cv (resume), in edit profile page, before applying on vacancy. Otherwise companies can not see your cv.
                  @endrole
                  @role('company|admin|cordinator')
                  Wait until your company is approved by admin. You can check the status in your profile.
                  @endrole
                  </span>
                </p>
                <a href="{{ asset('docs/template.txt') }}" target='_blank' class="btn btn-outline-primary">Download template</a>
              </div>
            </div>
            <div class="row information__blocks">

              <div class="col-lg-4 col-md-12 col-sm-12 col-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/helmet.png" alt="helmet" class="information__img">
                  <span class="information__title">EDU Career</span>
                </div>
                <p class="information__subtitle">
                  EDU Career is a special course for fourth year students (or third year students coming after college or NIS) that covers all elective courses of the penultimate semester (the one before last) of a study program.
                </p>
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/cogwheel.png" alt="cogwheel" class="information__img">
                  <span class="information__title">Goals</span>
                </div>
                <p class="information__subtitle">
                  The goals of EDU Career are the following:
                </p>
                <ul class="information__list">
                  <li>Increase the professional training of future specialists</li>
                  <li>Organize the training process of graduate students in accordance with the needs of employers</li>
                  <li>Strengthen the relationship between education and practice</li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/light-bulb.png" alt="light-bulb" class="information__img">
                  <span class="information__title">Duration</span>
                </div>
                <p class="information__subtitle">
                  The duration of EDU Career is 15 weeks during Fall Semester. It starts in September and ends in December.
                </p>
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pollution.png" alt="pollution" class="information__img">
                  <span class="information__title">Requirements for a candidate</span>
                </div>
                <p class="information__subtitle">
                  There is a GPA requirement for students who wish to participate in the "EDU Career" program:                </p>
                <ul class="information__list">
                  <li>Language Department - equal or more than 3.2</li>
                  <li>Natural Sciences Department - equal or more than 3.2</li>
                  <li>Humanities Department - equal or more than 3.3</li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pollution.png" alt="pollution" class="information__img">
                  <span class="information__title">Requirements for an educational organization</span>
                </div>
                <p class="information__subtitle">
                There are requirements to any organization to take part in the “EDU Career” program:
                </p>
                <ul class="information__list">
                  <li>Organization has to be registered as a juridical organization.</li>
                  <li>Organization has to possess/rent a building more than 150 m2</li>
                  <li>Organization has to have more than 15 full-time teaching employees</li>
                  <li>Organization has to have clean tax history</li>
                  <li>Organization has not violated obligations regarding the internship in the previous year (mentorship and  workload)</li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/wind-engine.png" alt="wind" class="information__img">
                  <span class="information__title">Limitations</span>
                </div>
                <p class="information__subtitle">
                  For {{now()->year}}-{{now()->year + 1}} academic year, the limitations are the following
                </p>
                <ul class="information__list">
                  <li>Total number of students for Language Department - 25</li>
                  <li>Total number of students for Natural Sciences Department - 45</li>
                  <li>Total number of students for Humanities Department - 55</li>
                </ul>
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pumpjack.png" alt="pumpjack" class="information__img">
                  <span class="information__title">Grading Policy</span>
                </div>
                <p class="information__subtitle">
                  There are five types of assessment at EDU Career. They are the following:
                </p>

                <div class="table-over">
                  <table class="table table-bordered main-table">
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
              </div>

              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/cogwheel.png" alt="cogwheel" class="information__img">
                  <span class="information__title">Important dates</span>
                </div>
                <p class="information__subtitle">
                  There are six important date periods. They are the following:
                </p>

                <div class="table-over">
                  <table class="table table-bordered main-table">
                    <thead>
                    <tr>
                      <th>Dates</th>
                      <th>Process</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Beginning of the May</td>
                        <td>Start for organizations’ registration</td>
                      </tr>
                      <tr>
                        <td>After FX exams (end of the June)</td>
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
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- End Main -->
@endsection
