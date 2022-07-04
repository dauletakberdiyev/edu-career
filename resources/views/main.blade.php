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
                  <span class="information__title">Beta Career</span>
                </div>
                <p class="information__subtitle">
                  Beta Career is a special course for fourth year students (or third year students coming after college) that covers all elective courses of the penultimate semester (the one before last) of a study program. Beta Career is optional and has its own requirements described in the next sections. The number of students that are admitted to Beta Career is limited.
                </p>
              </div>
          
              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/cogwheel.png" alt="cogwheel" class="information__img">
                  <span class="information__title">Goals</span>
                </div>
                <p class="information__subtitle">
                  The goals of Beta Career are the following:
                </p>
                <ul class="information__list">
                  <li>To master technical and soft skills</li>
                  <li>To gain essential background knowledge</li>
                  <li>To build a network of contacts</li>
                </ul>
              </div>
          
              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/light-bulb.png" alt="light-bulb" class="information__img">
                  <span class="information__title">Duration</span>
                </div>
                <p class="information__subtitle">
                  The duration of Beta Career is 15 weeks. It starts in September 2021, and ends in December 2022.
                </p>
              </div>
          
              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pollution.png" alt="pollution" class="information__img">
                  <span class="information__title">Types</span>
                </div>
                <p class="information__subtitle">
                  There are three types of Beta Career. Students can choose the one, which suits them, the most. They are the following:
                </p>
                <ul class="information__list">
                  <li>Industrial Beta</li>
                  <li>Academic Beta</li>
                  <li>SDU Beta</li>
                </ul>
          
                <p class="information__bottom">Subsequent sections of this document describe each type of Beta Career in more detail.</p>
              </div>
          
              <div class="col-lg-4 col-md-12 px-4 information__block">
                <div class="information__top">
                  <img src="./images/main/home/pumpjack.png" alt="pumpjack" class="information__img">
                  <span class="information__title">Grading Policy</span>
                </div>
                <p class="information__subtitle">
                  There are three types of Beta Career. Students can choose the one, which suits them, the most. They are the following:
                </p>
          
                <div class="table-over">
                  <table class="table table-bordered main-table">
                    <thead>
                    <tr>
                      <th>Type</th>
                      <th>Grade</th>
                      <th>Grader</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Formative Assessment</td>
                        <td>60</td>
                        <td>Supervisor</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td>Reports</td>
                        <td>15</td>
                        <td>Coordinator</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td>Final Presentation</td>
                        <td>25</td>
                        <td>Coordinator</td>
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
                  For 2021-2022 academic year, the limitations are the following
                </p>
                <ul class="information__list">
                  <li>Total number of students for Beta Career - 270</li>
                  <li>Total number of students for Industrial Beta - 200</li>
                  <li>Total number of students for Academic and SDU Beta - 70</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- End Main -->
@endsection