@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            

            <form class="mb-5" method="post" enctype="multipart/form-data" action="{{ route('admin.setPassword') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Set password</h3>
              </div>
              @csrf
              <div class="custom-form-control">
                <label>Email</label>
                <input name='email' required />
              </div>
              <div class="custom-form-control">
                <label>Password</label>
                <input name='password' required />
              </div>
              <button type="submit" class="btn btn-outline-primary">Set</button>
            </form>
          </div>
        </div>
      </main>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({});
        $('.select2').select2();
    });
</script>
@endsection