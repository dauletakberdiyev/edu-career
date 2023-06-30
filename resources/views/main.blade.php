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
              </div>
            </div>
            <div class="row information__blocks">
          
              <div class="col-lg-4 col-md-12 col-sm-12 col-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/helmet.png" alt="helmet" class="information__img">
                  <span class="information__title">EDU Career</span>
                </div>
                <p class="information__subtitle">
                  EDU Career is a special course for fourth year students (or third year students coming after college or NIS) that covers all elective courses of the penultimate semester (the one before last) of a study program. EDU Career is optional and has its own requirements described in the next sections. The number of students that are admitted to EDU Career is limited.
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
                  The duration of EDU Career is 15 weeks. It starts in September {{now()->year}}, and ends in December {{now()->year}}.
                </p>
              </div>
          
              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pollution.png" alt="pollution" class="information__img">
                  <span class="information__title">Requirements</span>
                </div>
                <p class="information__subtitle">
                  There are three departments of EDU Career. Each department has its own GPA requirements. They are the following:
                </p>
                <ul class="information__list">
                  <li>Language Department - equal or more than 3.5</li>
                  <li>Natural Sciences Department - equal or more than 3.5</li>
                  <li>Humanities Department - equal or more than 3.0</li>
                </ul>
          
    
              </div>
          
              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pumpjack.png" alt="pumpjack" class="information__img">
                  <span class="information__title">Grading Policy</span>
                </div>
                <p class="information__subtitle">
                  There are three types of assessment at EDU Career. They are the following:
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
                        <td>Mentor</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td>Internship plan</td>
                        <td>10</td>
                        <td>Edu Career Coordinator</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td>Reports (video report, daily week on platform youtube or instagram)</td>
                        <td>15</td>
                        <td>Edu Career Coordinator</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td>Weekly work plan</td>
                        <td>15</td>
                        <td>Edu Career Coordinator</td>
                      </tr>
                    </tbody>
                    <tbody>
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
            </div>
          </div>
        </div>
      </main>
      <!-- End Main -->
@endsection