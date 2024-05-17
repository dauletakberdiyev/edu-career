@extends('layouts.app')

@section('content')
@php
    $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">


            <form method="post" enctype="multipart/form-data" action="{{ route('user.update') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Edit profile</h3>
                  <button type="submit" class="btn btn-outline-primary">Save</button>
              </div>
              <div class="d-flex align-items-center mb-4">
                <img src="{{ $user->avatar }}" width="80" height="80" class="profile-img">
              </div>
              @csrf
              <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="custom-form-control">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $user->email }}" disabled="disabled">
              </div>
              <div class="custom-form-control">

                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" value="{{ $user->firstname }}">
              </div>
              <div class="custom-form-control">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="{{ $user->lastname }}">
              </div>
              <div class="custom-form-control">
                <label>Picture</label>
                <input type="file" class="form-control-file" name="avatar" accept="image/jpeg,image/png,image/gif">
              </div>

              @role('student')
              <div class="custom-form-control">
                <label>Internship Plan (link)</label>
                <input type="text" class="form-control" placeholder="Enter internship plan link" name="internship_plan" value="{{ $user->internship_plan }}">
              </div>
              <div class="custom-form-control">
                  <label>CV</label>
                  <input type="file" class="form-control-file" name="cv" accept="pdf,doc,docx">
              </div>
              @endrole
              @if($user->cv != null)
              <div class="custom-form-control">
                <div class="form-group group-profile">
                    <label class="mb-0">Your CV</label>
                    <a href="{{ $user->cv }}" download >Click here to download your cv</a>
                </div>
              </div>
              @endif
            </form>

            @role('company')
            @php
              $company = $user->company;
            @endphp

                    <div class="page__top">
                        <h3 class="page__title">Update Company</h3>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                      <img src="{{ $company->avatar }}" width="80" height="80" class="profile-img">
                    </div>

                    <form action="{{ route('company.update.form') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" type="hidden" value="{{ $company->id }}">
                        <div class="fill-group">
                          <label class="mb-0">Status</label>
                            @if($company->in_whitelist)
                            <span class="flex9 text-success">Whitelisted</span>
                            @else
                            <span class="flex9 text-primary">Not whitelisted</span>
                            @endif
                        </div>
                        <div class="fill-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" v-model="firstName" value="{{ $company->name }}">
                        </div>
                        <div class="fill-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" v-model="lastName" value="{{ $company->address }}">
                        </div>
                        <div class="fill-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" placeholder="Enter Description" name="description" v-model="lastName">{{ $company->description }}</textarea>
                        </div>
                        <div class="fill-group">
                            <label>Logo</label>
                            <input type="file" name="company_avatar" class="form-control-file" accept="image/jpeg,image/png,image/gif">
                        </div>

                        <div class="fill-group mb-3">
                            <label>CV</label>
                            <input type="file" name="cv" class="form-control-file">
                        </div>
                        <div class="form-group mb-3">
                            <label for="lease_contract">Договор аренды / Имения здания</label>
                            <input type="file" class="form-control" id="lease_contract" name="lease_contract">
                        </div>
                        <div class="form-group mb-3">
                            <label for="registration_certificate">Legal registration / Юридичеикая регистрация</label>
                            <input type="file" class="form-control" id="registration_certificate" name="registration_certificate">
                        </div>

                        <div class="form-group mb-3">
                            <label for="photos">Company Photos</label>
                            <input type="file" class="form-control" id="photos" name="photos[]" multiple>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitStaff">Save</button>
                        </div>


                    </form>
            @endrole
          </div>

        @role('student')
        <div class="row">
            <div class="col-md-12">
                <h2>Timetable</h2>
                <form id='timetable_form' action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary mb-2" id="timetable_save">Save timetable</button>
                    <p class="text-muted">Click on a day to add a class. Click on a class to remove it.</p>
                    <div class="form-group">
                        <div id="timetable"></div>
                        <input type="hidden" name="timetable">
                    </div>
                </form>
            </div>
        </div>
        @endrole
        </div>
      </main>
@endsection


@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var timetable = JSON.parse(@json($user->timetable ?? '[]'));
    var calendarEl = document.getElementById('timetable');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay,listWeek,dayGridMonth'
        },
        initialView: 'timeGridWeek',
        editable: true,
        slotDuration: '01:00:00', 
        slotMinTime: '06:00:00',
        slotMaxTime: '24:00:00',
        allDaySlot: false,
        eventDrop: function(info) {
          updateTimetable();
        },
        eventResize: function(info) {
          updateTimetable();
        },
        dateClick: function(info) {
            var event = {
                title: 'Class',
                startTime: moment(info.date).format('HH:mm:ss'),
                endTime: moment(info.date).add(1, 'hour').format('HH:mm:ss'),
                daysOfWeek: [info.date.getDay()],
                color: 'red'
            };
            console.log(event)
            calendar.addEvent(event);
            calendar.getEvents().forEach(function(event) {
                console.log([new Date(event.start).getDay()]);
            });

        },
            eventClick: function(info) {
                info.event.remove();
                updateTimetable();
            }
    });
    if (Array.isArray(timetable)) {
            timetable.forEach(function(event) {
                console.log(event);
                calendar.addEvent({
                    id: event.id,
                    title: event.title,
                    startTime: moment(event.startTime).format('HH:mm:ss'),
                    endTime: moment(event.endTime).format('HH:mm:ss'),
                    daysOfWeek: event.daysOfWeek,
                    color: 'red'
                });
            });
        }

function updateTimetable() {
    var events = [];
    calendar.getEvents().forEach(function(event) {
        events.push({
            id: event.id,
            title: event.title,
            startTime: event.startStr,
            endTime: event.endStr,
            daysOfWeek: [new Date(event.start).getDay()],
        });
    });
    $('input[name="timetable"]').val(JSON.stringify(events));
} 
    calendar.render();

    $('#timetable_form').submit(function() {
      updateTimetable();
        });
  });
</script>
@endsection

@section('styles')
<style>
    #timetable {
        height: 550px;
    }
</style>
@endsection
