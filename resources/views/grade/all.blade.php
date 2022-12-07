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
                <table id="table"  class="table main-table table-striped">
                  <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                      <th>Reports</th>
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
                                {{ $user->email }}
                            </th>
                            <th>
                                {{ $user->firstname }} {{ $user->lastname }}
                            </th>
                            <th>
                                {{ $grade->report }}
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
                                    <input type="number" class="form-control" name="supervisormark-{{ $grade->id }}" value="{{ $grade->supervisor }}" onchange="updateSupervisorMark({{ $grade->id }})">
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

    function updateSupervisorMark(id) {
        var mark = $('input[name=supervisormark-' + id + ']').val();
        $.ajax({
            url: "{{ route('grade.updateSupervisorMark') }}",
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
</script>
@endsection