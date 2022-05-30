@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top flex-wrap">
                        <h3 class="page__title">Manage Registration</h3>

<!--                        <a class="btn btn-outline-primary">Add Report</a>-->
                    </div>


                    <form method="get">
                        <div class="d-flex registration-forms search-second">
                            <div class="form-group flex-column align-items-start">
                                <label>Search by student ID</label>
                                <div class="block-search">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp"
                                           v-model="search">
                                </div>
                            </div>

                            <div class="form-group flex-column align-items-start ml-3">
                                <label class="form-label">Beta type:</label>
                                <select id="inputState" class="form-select">
                                    <option selected>-------</option>
                                    <option>SDU Beta</option>
                                    <option>Academic Beta</option>
                                    <option>Industrial Beta</option>
                                </select>
                            </div>

                            <div class="form-group flex-column align-items-start ml-3">
                                <label class="form-label">Registration status</label>
                                <select id="inputState" class="form-select">
                                    <option selected>-------</option>
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
                                </select>
                            </div>

                            <div class="btn-box">
                                <button class="btn btn-outline-primary registration-save-btn">Save date</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-outer">
                        <table class="table main-table">
                            <thead>
                                <tr>
                                  <th>Student</th>
                                  <th>SDU email</th>
                                  <th>Supervisor</th>
                                  <th>Beta type</th>
                                  <th>Agreement</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                  <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @foreach($registrations as $reg)
                                <tr>
                                    <td>{{ $reg->user->firstname }} {{ $reg->user->lastname }}</td>
                                    <td>{{ $reg->user->email }}</td>
                                    <td>{{ $reg->vacancy->company->user->email }}</td>
                                    <td>
                                        @if($reg->vacancy->type == 0)
                                            Industrial
                                        @else
                                            Academic
                                        @endif
                                    </td>
                                    <td>
                                      <a href="{{ $reg->agreement }}" download>Download</a>
                                    </td>
                                    <td>
                                        @if($reg->status == 0)
                                            <span class=" text-warning">Pending</span>
                                        @elseif($reg->status == 1)
                                            <span class=" text-success">Approved</span>
                                        @elseif($reg->status == 2)
                                            <span class=" text-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($reg->status != 1)
                                        <button class="btn btn-success btn-sm changeStatus" reg_id="{{ $reg->id }}" status=1>
                                            Confirm
                                        </button>
                                        @endif
                                        @if($reg->status != 2)
                                        <button class="btn btn-danger btn-sm changeStatus" reg_id="{{ $reg->id }}"  status=2>
                                            Reject
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <textarea type="text" id="{{ $reg->id }}_reason" name="reason" placeholder="Write the reason">
                                        </textarea>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="align-content-center justify-content-center d-flex">
                        <ul class="pagination">
                            <li>
                                <button class="btn btn-outline-primary"> < </button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary">1</button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary">2</button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary">3</button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary"> > </button>
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
    $(".changeStatus").on('click', function(event){
      var reg_id = $(this).attr('reg_id');
      var status = $(this).attr('status');
      var reason = $("#"+reg_id+"_reason").val();

      var url = "";
      if(status == 1) {
        url = "{{ route('registration.confirm') }}";
      } else if(status == 2) {
        url = "{{ route('registration.reject') }}";
      } else {
        url = "{{ route('registration.pending') }}";
      }

      $.ajax({
        url: url,
        type: 'POST',
        data: {
          "_token": "{{ csrf_token() }}",
          registration_id: reg_id,
          reason: reason
        },
        success: function(data) {
          window.location.reload();
        },
        error: function(data) {
          alert(data['message']);
        }
      });
    });
  </script>
@endsection