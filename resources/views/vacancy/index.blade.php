@extends('layouts.app')

@section('content')
      <main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Vacancies</h3>
            </div>
          
            <form method="POST" class="search-group" action="{{ route('vacancy.search') }}">
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
                    <th>Company</th>
                    <th>Name</th>
                    <th>Quota</th>
                    <th>Type</th>
                    <th>Applicants</th>
                  </tr>
                  </thead>
                  <tbody class="text-dark">
                    @foreach($vacancies as $vacancy)
                      <tr>
                        @php 
                            $company = $vacancy->company;
                        @endphp
                        <td> 
                          <a href="{{ route('company.detail', ['id'=>$company->id]) }}" >
                            {{ $company->name }}
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('vacancy.detail', ['id'=>$vacancy->id]) }}" >
                            {{ $vacancy->title }}
                          </a>
                        </td>
                        <td>{{ $vacancy->quota }}</td>
                        <td>
                          @if($vacancy->type == 1)
                            Academ
                          @else
                            Industrial
                          @endif
                        </td>
                        <td>
                          {{ $vacancy->applicants->count() }}
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class="align-content-center justify-content-center d-flex">
                <ul class="pagination">
                  <li>
                    <a class="btn btn-outline-primary" href="{{ $vacancies->previousPageUrl() }}"> < </a>
                  </li>
                  @for ($i = 1; $i <= $vacancies->lastPage(); $i++)
                  <li>
                    <a class="btn btn-outline-primary {{ ($vacancies->currentPage() == $i) ? ' active' : '' }}" href="{{ $vacancies->url($i) }}"> {{ $i }}</a>
                  </li>
                  @endfor
                  <li>
                    <a class="btn btn-outline-primary" href="{{ $vacancies->nextPageUrl() }}"> > </a>
                  </li>
                </ul>
              </div>
          </div>
        </div>
      </main>
@endsection