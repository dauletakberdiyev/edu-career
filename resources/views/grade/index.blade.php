@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Grades</h3>
            </div>
            <div class="table-outer">
                <table id="order-table"  class="table main-table table-striped">
                  <thead>
                    <tr>
                      <th>Reports</th>
                      <th>Presentation</th>
                      <th>Supervisor mark</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark">
                    <tr>
                        <th>
                            {{ $grade->report }}
                        </th>
                        <th>
                            {{ $grade->final }}
                        </th>
                        <th>
                            {{ $grade->supervisor }}
                        </th>
                        <th>
                            {{ $grade->report + $grade->final + $grade->supervisor }}
                        </th>
                    </tr>
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