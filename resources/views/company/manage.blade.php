@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Manage Company</h3>
          
              <a class="btn btn-outline-primary" href="{{ route('company.add') }}">Add company</a>
            </div>
          
            <form method="POST" class="search-group" action="{{ route('staff.search') }}">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Faculty</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="text-dark">
                    @foreach($companies as $company)
                      <tr>
                        <td> 
                          <a href="{{ route('company.detail', ['id'=>$company->id]) }}" >
                            {{ $company->name }}
                          </a>
                        </td>
                        
                        <td>
                          @if($company->user != null)
                          {{ $company->user->email }}
                          @endif
                        </td>
                        <td>{{ $company->address }}</td>
                        <td></td>
                        <td>
                            <img src="{{ $company->avatar }}" alt="default__img" class="table__img">
                        </td>
                        @role('admin')
                        <td>
                            <a href="{{ route('company.update', ['id' => $company->id]) }}" class="table-tool" @click.prevent="editcompany">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="528.899px" height="528.899px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve" fill="#212529">
                                    <g>
                                        <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981
                                            c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611
                                            C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069
                                            L27.473,390.597L0.3,512.69z"></path>
                                    </g>
                                </svg>
                            </a>
                            @if($company->in_whitelist == 0)
                              <button class="btn btn-success changeStatus" company_id="{{ $company->id }}" status=1>
                                Approve
                              </button>
                            @else
                              <button class="btn btn-danger changeStatus"  company_id="{{ $company->id }}" status=0>
                                Unapprove
                              </button>
                            @endif
                         </td>
                         @endrole
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class="align-content-center justify-content-center d-flex">
                <ul class="pagination">
                  <li>
                    <a class="btn btn-outline-primary" href="{{ $users->previousPageUrl() }}"> < </a>
                  </li>
                  @for ($i = 1; $i <= $users->lastPage() + 5; $i++)
                  <li>
                    <a class="btn btn-outline-primary {{ ($users->currentPage() == $i) ? ' active' : '' }}" href="{{ $users->url($i) }}"> {{ $i }}</a>
                  </li>
                  @endfor
                  <li>
                    <a class="btn btn-outline-primary" href="{{ $users->nextPageUrl() }}"> > </a>
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
      var status = $(this).attr('status');
      var company_id = $(this).attr('company_id');
      var url = "";

      if(status == 1) {
        url = "{{ route('company.approve') }}";
      } else if(status == 0) {
        url = "{{ route('company.reject') }}";
      }

      $.ajax({
        url: url,
        type: 'POST',
        data: {
          "_token": "{{ csrf_token() }}",
          company_id: company_id,
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