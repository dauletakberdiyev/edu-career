@extends('layouts.app')

@section('meta')
  <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
@php 
  $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top">
                <h3 class="page__title">{{ $vacancy->title }}</h3>
                <br>
                @role('student')
                  @php 
                    $applicant = $vacancy->applicants()->where('user_id', $user->id)->first()
                  @endphp
                  @if($applicant != null)
                    <button class="flex btn btn-outline-warning" onclick="cancelVacancy()">Cancel application</button>
                  @else
                  @if($vacancy->quota > 0)
                    <button class="flex btn btn-outline-info" onclick="applyVacancy()">Apply</button>
                  @endif
                  @endif
                @endrole
                
                <a class="flex btn btn-outline-primary" href="{{ route('vacancy.index') }}">Back</a>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Quota</label>
              <span class="flex9 text-secondary">
                  {{ $vacancy->quota }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Type</label>
                <span class="flex9 text-secondary">
                    @if($vacancy->type == 1)
                      Industrial
                    @else
                      Academic
                    @endif
                </span>
            </div>
            <div class="form-group group-profile">
              <label class="mb-0">Description</label>
                <span class="flex9 text-primary">
                    {{ $vacancy->description }}
                </span>
            </div>

            @if(Auth::user()->id == $vacancy->company->user_id)
            <div class="page__top flex-wrap">
              <h3 class="page__title">Applicants</h3>
            </div>
          
            <form method="POST" class="search-group" action="{{ route('vacancy.search') }}">
            @csrf
              <label for="exampleInputEmail1">Search</label>
              <div class="input-group">
                <input type="text" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       v-model="search", name="search">
                <button class="btn btn-outline-primary" @click.prevent="searchEmail">Search</button>
              </div>
            </form>
          
            <div class="table-outer">
                <table class="table main-table">
                  <thead>
                  <tr>
                    <th>Student</th>
                    <th>Email</th>
                    <th>CV</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="text-dark">
                    @foreach($applicants as $applicant)
                      <tr>
                        <td>
                          <a href="{{ route('student.profile', ['id'=>$applicant->id]) }}" >
                            {{ $applicant->firstname }} {{ $applicant->lastname }}
                          </a>
                        </td>
                        <td>{{ $applicant->email }}</td>
                        <td>
                          @if($applicant->cv != null)
                          <a href="{{ $applicant->cv }}" download >download cv</a>
                          @else
                          No cv
                          @endif
                        </td>
                        <td>
                          @if($applicant->pivot->status == 1)
                            <span class="flex9 text-success">Approved</span>
                          @elseif($applicant->pivot->status == 2)
                            <span class="flex9 text-danger">Rejected</span>
                          @else
                            <span class="flex9 text-warning">Pending</span>
                          @endif
                        </td>
                        <td>
                            @if($applicant->pivot->status != 1)
                            <button class="btn btn-success btn-sm changeStatus" vacancy_id="{{ $vacancy->id }}" user_id="{{ $applicant->id }}" status=1>
                                Approve
                            </button>
                            @endif
                            @if($applicant->pivot->status != 2)
                            <button class="btn btn-danger btn-sm changeStatus" vacancy_id="{{ $vacancy->id }}" user_id="{{ $applicant->id }}" status=2>
                                Reject
                            </button>
                            @endif
                            @if($applicant->pivot->status != 0)
                            <button class="btn btn-warning btn-sm changeStatus" vacancy_id="{{ $vacancy->id }}" user_id="{{ $applicant->id }}" status=0>
                                Pending
                            </button>
                            @endif
                         </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class="align-content-center justify-content-center d-flex">
                <ul class="pagination">
                  <li>
                    <a class="btn btn-outline-primary" href="{{ $applicants->previousPageUrl() }}"> < </a>
                  </li>
                  @for ($i = 1; $i <= $applicants->lastPage(); $i++)
                  <li>
                    <a class="btn btn-outline-primary {{ ($applicants->currentPage() == $i) ? ' active' : '' }}" href="{{ $applicants->url($i) }}"> {{ $i }}</a>
                  </li>
                  @endfor
                  <li>
                    <a class="btn btn-outline-primary" href="{{ $applicants->nextPageUrl() }}"> > </a>
                  </li>
                </ul>
              </div>
            </div>
          @endif
        </div>
      </main>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script> 
    function applyVacancy() {
      var vacancyId = {{ $vacancy->id }};
      var userId = {{ $user->id }};
      
      
      $.ajax({
        url: '{{ route("vacancy.apply") }}',
        type: 'POST',
        data: {
          "_token": "{{ csrf_token() }}",
          vacancy_id: vacancyId,
          user_id: userId
        },
        success: function(data) {
          alert(data['message']);
          window.location.reload();
        },
        error: function(data) {
          alert(data['message']);
        }
      });
    };

    function cancelVacancy() {
      var vacancyId = {{ $vacancy->id }};
      var userId = {{ $user->id }};
      
      
      $.ajax({
        url: '{{ route("vacancy.reject.application") }}',
        type: 'POST',
        data: {
          "_token": "{{ csrf_token() }}",
          vacancy_id: vacancyId,
          user_id: userId
        },
        success: function(data) {
          alert(data['message']);
          window.location.reload();
        },
        error: function(data) {
          alert(data['message']);
        }
      });
    };

    function changeStatus(status) {
      var $item = $(this).closest("input").val();
      console.log($item);
    };
    $(".changeStatus").on('click', function(event){
      var vacancy_id = $(this).attr('vacancy_id');
      var user_id = $(this).attr('user_id');
      var status = $(this).attr('status');

      var url = "";
      if(status == 1) {
        url = "{{ route('vacancy.approve') }}";
      } else if(status == 2) {
        url = "{{ route('vacancy.reject') }}";
      } else {
        url = "{{ route('vacancy.pending') }}";
      }

      $.ajax({
        url: url,
        type: 'POST',
        data: {
          "_token": "{{ csrf_token() }}",
          vacancy_id: vacancy_id,
          user_id: user_id
        },
        success: function(data) {
          alert(data['message']);
          window.location.reload();
        },
        error: function(data) {
          alert(data['message']);
        }
      });
    });
  </script>
@endsection