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
            @if($report)
            <div class="page__top">
                <h3 class="page__title">{{ $report->name }}</h3>
                
                <a class="flex btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Deadline</label>
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
              <h3 class="page__title">Report submission</h3>
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
                        $user = auth()->user();
                        $applicant = $report->users()->where('user_id', $user->id)->first();
                    @endphp
                    @if($applicant)
                      <tr>
                        <td>
                            {{ $applicant->firstname }} {{ $applicant->lastname }}
                        </td>
                        <td>
                            {{ $applicant->email }}
                        </td>
                        <td>
                            <a href="{{ $applicant->pivot->submission_link }}" target="_blank">
                                link on submission
                            </a>
                        </td>
                        <td>
                            {{ $applicant->pivot->created_at }}
                        <td>
                            <input type="number" class="form-control" name="mark" value="{{ $applicant->pivot->mark }}" disabled>
                        </td>
                      </tr>
                    @else 
                        <tr>
                            <td>
                                {{ $user->firstname }} {{ $user->lastname }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <input type="text" class="form-control" name="submission_link" placeholder="Paste the link to your report here" required>
                            </td>
                            <td>
                                {{ date('Y-m-d') }}
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="submitReport({{ $user->id }}, {{ $report->id }})">Submit</button>
                            </td>
                            </td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            @else 
            No reports to submit
            @endif
            </div>
        </div>
      </main>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script> 

function submitReport(user_id, report_id) {
    var submission_link = $('input[name="submission_link"]').val();
    $.ajax({
        type: 'POST',
        url: "{{ route('report.addSubmit') }}",
        data: {
            user_id: user_id,
            report_id: report_id,
            submission_link: submission_link,
            _token: $('meta[name="_token"]').attr('content')
        },
        success: function(data) {
            console.log(data);
            window.location.reload();
        }
    });
}

function updateMark(id, report_id) {
  var mark = $('input[name=mark]').val();
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