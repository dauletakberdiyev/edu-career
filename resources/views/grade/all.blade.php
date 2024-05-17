@extends('layouts.app')

@section('meta')
  <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Grades</h3>
            </div>
            <div class="table-outer">
                <span class="text-info">
                    @role('admin|cordinator')
                        Supervisor mark should be in range 0-40. Maximum point is 40. <br>
                    @endrole
                    @role('company')
                        Supervisor mark should be in range 0-40. Maximum point is 40.
                    @endrole

                </span>
                <table id="table"  class="table main-table table-striped">
                  <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Reports</th>
                        <th>Weeky Report</th>
                        <th>Internship Plan</th>
                        <th>Presentation</th>
                        <th>Supervisor mark</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark">
                    @foreach($grades as $grade)
                        <tr>
                            @php
                                $user = $grade->user;
                            @endphp
                            <th>
                                @isset($user->email)
                                    {{ $user->email }}
                                @endisset
                            </th>
                            <th>
                                @isset($user->firstname)
                                    {{ $user->firstname }} {{ $user->lastname }}
                                @endisset
                            </th>
                            <th>
                                {{ $grade->report }}
                            </th>
                            <th>
                                @role('admin|coordinator')
                                    <input type="number" class="form-control" name="weeklyreport-{{ $grade->id }}" value="{{ $grade->weekly_report }}" onchange="updateMark({{ $grade->id }}, 'weeklyreport')">
                                @else
                                    {{ $grade->weekly_report }}
                                @endrole
                            </th>
                            <th>
                                @role('admin|coordinator')
                                    <input type="number" class="form-control" name="internshipplan-{{ $grade->id }}" value="{{ $grade->internship_plan }}" onchange="updateMark({{ $grade->id }}, 'internshipplan')">
                                @else
                                    {{ $grade->internship_plan }}
                                @endrole
                            </th>
                            <th>
                                @role('admin|coordinator')
                                    <input type="number" class="form-control" name="finalmark-{{ $grade->id }}" value="{{ $grade->final }}" onchange="updateFinalMark({{ $grade->id }})">
                                @else
                                    {{ $grade->final }}
                                @endrole
                            </th>
                            <th>
                                @role('admin|coordinator|company')
                                    @if($grade->supervisor_mark == null)
                                        <input type="number" class="form-control" name="supervisormarkold-{{ $grade->id }}" value="{{ $grade->supervisor }}" onchange="updateSupervisorMark({{ $grade->id }})">
                                    @else 
                                        <table>
                                            <tr>
                                                @foreach(json_decode($grade->supervisor_mark) as $index => $mark)
                                                    <td><label for="supervisormark-{{ $index }}">Month {{ $index + 1 }}</label></td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach(json_decode($grade->supervisor_mark) as $index => $mark)
                                                    <td>
                                                        <select class="form-control" id="supervisormark-{{ $index }}" name="supervisormark-{{ $index }}" onchange="updateSupervisorMark({{ $grade->id }}, {{ $index }})">
                                                            <option value="0" @if($mark == 0) selected @endif>0</option>
                                                            <option value="2.5" @if($mark == 2.5) selected @endif>2.5</option>
                                                            <option value="5" @if($mark == 5) selected @endif>5</option>
                                                            <option value="7.5" @if($mark == 7.5) selected @endif>7.5</option>
                                                            <option value="10" @if($mark == 10) selected @endif>10</option>
                                                        </select>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </table>
                                    @endif      
                                @else
                                    {{ $grade->supervisor }}
                                @endrole
                            </th>
                            <th>
                                {{ $grade->report + $grade->final + $grade->supervisor }}
                            </th>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </main>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({});
    });

    function updateSupervisorMark(id, index = null) {
        if (index != null)
            var mark = $('select[name=supervisormark-' + index + ']').val();
        else    
            var mark = $('input[name=supervisormarkold-' + id + ']').val();

        $.ajax({
            url: "{{ route('grade.updateSupervisorMark') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                index: index,
                mark: mark
            },
            success: function(data) {
                console.log(data['success']);
                alert('success');
            }
        });
    }


    function updateFinalMark(id) {
        var mark = $('input[name=finalmark-' + id + ']').val();
        $.ajax({
            url: "{{ route('grade.updateFinalMark') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                mark: mark
            },
            success: function(data) {
                console.log(data['success']);
                alert('success');
            }
        });
    }

    function updateMark(id, type) {
        if (type == 'weeklyreport') {
            var mark = $('input[name=weeklyreport-' + id + ']').val();
        } else if (type == 'internshipplan') {
            var mark = $('input[name=internshipplan-' + id + ']').val();
        }
        $.ajax({
            url: "{{ route('grade.updateMark') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                mark: mark,
                type: type
            },
            success: function(data) {
                console.log(data['success']);
                alert('success');
            }
        });
    }
</script>
@endsection
