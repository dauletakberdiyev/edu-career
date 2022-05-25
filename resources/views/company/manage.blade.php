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
                        <td>{{ $company->user->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->user->faculty->name }}</td>
                        <td>
                            <img src="{{ $company->avatar }}" alt="default__img" class="table__img">
                        </td>
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
                    
                            <a href="#" class="table-tool"  @click.prevent="$emit('deletecompany', info)">
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" fill="#212529"><g><path d="m424 64h-88v-16c0-26.51-21.49-48-48-48h-64c-26.51 0-48 21.49-48 48v16h-88c-22.091 0-40 17.909-40 40v32c0 8.837 7.163 16 16 16h384c8.837 0 16-7.163 16-16v-32c0-22.091-17.909-40-40-40zm-216-16c0-8.82 7.18-16 16-16h64c8.82 0 16 7.18 16 16v16h-96z"></path><path d="m78.364 184c-2.855 0-5.13 2.386-4.994 5.238l13.2 277.042c1.22 25.64 22.28 45.72 47.94 45.72h242.98c25.66 0 46.72-20.08 47.94-45.72l13.2-277.042c.136-2.852-2.139-5.238-4.994-5.238zm241.636 40c0-8.84 7.16-16 16-16s16 7.16 16 16v208c0 8.84-7.16 16-16 16s-16-7.16-16-16zm-80 0c0-8.84 7.16-16 16-16s16 7.16 16 16v208c0 8.84-7.16 16-16 16s-16-7.16-16-16zm-80 0c0-8.84 7.16-16 16-16s16 7.16 16 16v208c0 8.84-7.16 16-16 16s-16-7.16-16-16z"></path></g></svg>
                            </a>
                         </td>
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
                  @for ($i = 1; $i <= $users->lastPage(); $i++)
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