@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top">
                <h3 class="page__title">Profile</h3>
                <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
            </div>
        
            <div class="d-flex align-items-center mb-4">
              <img src="{{ $user->avatar }}" width="80" height="80" class="profile-img">
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Email</label>
              <span class="flex9 text-secondary">
                  {{ $user->email }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">First name</label>
              <span class="flex9 text-secondary">
                    {{ $user->firstname }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Last name</label>
              <span class="flex9 text-secondary">
                {{ $user->lastname }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Faculty</label>
              <span class="flex9 text-secondary">
                {{ $user->faculty->name }}
                  </span>
            </div>
              <div class="form-group group-profile">
                <label class="mb-0">Internship Plan (link)</label>
                <span class="flex9 text-secondary">
                  @if($user->internship_plan != null)
                    <a href="{{ $user->internship_plan }}">Download internship plan</a>
                  @else
                    No internship plan
                  @endif
                </span>
              </div>
           
            <div class="form-group group-profile">
              <label class="mb-0">CV</label>
              <span class="flex9 text-secondary">
                @if($user->cv != null)
                  <a href="{{ $user->cv }}" download >Click here to download cv</a>
                @else
                  <span class="flex9 text-warning"> No CV </span>
                  <a href="https://drive.google.com/file/d/1wuLFR8nRFYAfTftRSBvwkioQ_OAclTXs/view" target='_blank' class="">Download CV template</a>
                @endif
              </span>
            </div>
           
        <div class="row">
            <div class="col-md-12">
                <h2>Timetable</h2>
                <form id='timetable_form' action="{{ route('user.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <div id="timetable"></div>
                        <input type="hidden" name="timetable">
                    </div>
                </form>
            </div>
        </div>
          </div>
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

    calendar.render();

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