@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Manage Reports</h3>
          
              <a class="btn btn-outline-primary" href="{{ route('report.add') }}">New Repport</a>
            </div>
            <div class="table-outer">
                <table id="order-table"  class="table main-table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Detail</th>
                      <th>Deadline</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark">
                    @foreach($reports as $report)
                    <tr>
                      <td>
                        <a href="{{ route('report.show', $report->id) }}">{{ $report->name }}</a>
                      </td>
                      <td>{{ $report->detail }}</td>
                      <td>{{ $report->due_date }}</td>
                      <td>
                        <a class="btn btn-outline-primary" href="{{ route('report.edit', $report->id) }}">Edit</a>
                        <a class="btn btn-outline-primary" href="{{ route('report.delete', $report->id) }}">Delete</a>
                      </td>
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

</script>
@endsection