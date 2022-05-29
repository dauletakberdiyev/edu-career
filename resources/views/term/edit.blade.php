@extends('layouts.app')

@section('content')
@php 
    $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            

            <form method="post" enctype="multipart/form-data" action="{{ route('term.update') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Term</h3>
                  <button type="submit" class="btn btn-outline-primary">Save</button>
              </div>
              @csrf
              <input type="hidden" name="id" value="{{ $term->id }}">
              <div class="custom-form-control">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $term->name }}">
              </div>
              <div class="custom-form-control">
                <label>Registration end</label>
                <input type="date" class="form-control" name="registration_end" value="{{ $term->registration_end }}">
              </div>
              <div class="custom-form-control">
                <label>Grading start</label>
                <input type="date" class="form-control" name="grading_start" value="{{ $term->grading_start }}">
              </div>
              <div class="custom-form-control">
                <label>Grading end</label>
                <input type="date" class="form-control" name="grading_end" value="{{ $term->grading_end }}">
              </div>
              <div class="custom-form-control">
                <label>Term end</label>
                <input type="date" class="form-control" name="term_end" value="{{ $term->term_end }}">
              </div>
            </form>
          </div>
        </div>
      </main>
@endsection