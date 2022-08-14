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
                <h3 class="page__title">{{ $report->name }}</h3>
                
                <a class="flex btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Due date</label>
              <span class="flex9 text-secondary">
                  {{ $report->due_date }}
                </span>
            </div>
            <div class="form-group group-profile">
              <label class="mb-0">Detail</label>
                <span class="flex9 text-primary">
                    {{ $report->detail }}
                </span>
            </div>

            <div class="page__top flex-wrap">
              <h3 class="page__title">Submissions</h3>
            </div>
          
            <div class="table-outer">
                <table class="table main-table">
                  <thead>
                  <tr>
                    <th>Student</th>
                    <th>Email</th>
                    <th>Submission</th>
                    <th> Submission date</th>
                    <th>Mark</th>
                  </tr>
                  </thead>
                  <tbody class="text-dark">
                    @php 
                        $applicants = $report->users()->paginate(10);
                    @endphp
                    @foreach($applicants as $applicant)
                      <tr>
                        <td>
                          <a href="{{ route('student.profile', ['id'=>$applicant->id]) }}" >
                            {{ $applicant->firstname }} {{ $applicant->lastname }}
                          </a>
                        </td>
                        <td>
                            {{ $applicant->email }}
                        </td>
                        <td>
                            <a href="{{ $applicant->pivot->submission_link }}" target="_blank">
                                {{ $applicant->pivot->submission_link }}
                            </a>
                        </td>
                        <td>
                            {{ $applicant->pivot->created_at }}
                        <td>
                            <input type="number" class="form-control" name="mark-{{ $applicant->id }}" value="{{ $applicant->pivot->mark }}" onchange="updateMark({{ $applicant->id }}, {{ $report->id }})">
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
        </div>
      </main>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script> 

function updateMark(id, report_id) {
  var mark = $('input[name=mark-' + id + ']').val();
  $.ajax({
    url: "{{ route('report.updateMark') }}",
    type: 'POST',
    data: {
      "_token": "{{ csrf_token() }}",
      id: id,
      report_id: report_id,
      mark: mark
    },
    success: function(data) {
      console.log(data['success']);
    }
  });
}
</script>
@endsection