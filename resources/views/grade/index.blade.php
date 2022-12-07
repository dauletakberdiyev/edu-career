@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Grades</h3>
            </div>
            
            @if (auth()->user()->feedback == null && false)
            <form class="mb-5" method="post" enctype="multipart/form-data" action="{{ route('feedback.store') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Please rate your betacareer.</h3>
              </div>
              @csrf
              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
              <div class="row">
                <div class="col">
                  <div class="custom-form-control">
                    <label>Rate</label>
                    <input type="number" class="form-control" placeholder="Rate from 1 to 5" name="rate" min="1" max="5">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <div class="custom-form-control">
                    <label>Short comment</label>
                    <textarea type="text" class="form-control" name="note" min="1" max="5"></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
            @endif
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