@extends('layouts.app')

@section('content')
@php 
    $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            

            <form method="post" enctype="multipart/form-data" action="{{ route('assign.student') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Assign student to company</h3>
              </div>
              @csrf
              <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="custom-form-control">
                <label>Student</label>
                <select name="user_id" class="form-select selectpicker" aria-label="Default select example" id="select-student" data-live-search="true">
                    <option selected>Open this select menu</option>
                    @foreach($students as $student)
                        <option data-tokens="{{ $student->email }}" value="{{ $student->id }}">{{ $student->email }}</option>
                    @endforeach
                </select>
              </div>
              <div class="custom-form-control">
                <label>Company</label>
                <select name="company_id" class="form-select selectpicker" aria-label="Default select example" data-live-search="true">
                    <option selected>Select company</option>
                    @foreach($companies as $company)
                        @if ($company->user != null)
                        <option data-tokens="{{ strtolower($company->name) }}" value="{{ $company->id }}">{{ $company->name }} - {{ $company->user->email }}</option>
                        @else
                        <option data-tokens="{{ strtolower($company->name) }}" value="{{ $company->id }}">{{ $company->name }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
          </div>
        </div>
      </main>
@endsection

@section('scripts')
@endsection