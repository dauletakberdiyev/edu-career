@extends('layouts.app')

@section('content')
@php 
    $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <form method="post" enctype="multipart/form-data" action="{{ route('term.store') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Add term</h3>
                  <button type="submit" class="btn btn-outline-primary">Add</button>
              </div>
              @csrf
              <div class="">
                <label>Active</label>
                <input type="checkbox" class="form-check-input" name="active">
              </div>
              <div class="custom-form-control">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
              </div>
              <div class="custom-form-control">
                <label>Registration end</label>
                <input type="date" class="form-control" name="registration_end">
              </div>
              <div class="custom-form-control">
                <label>Grading start</label>
                <input type="date" class="form-control" name="grading_start">
              </div>
              <div class="custom-form-control">
                <label>Grading end</label>
                <input type="date" class="form-control" name="grading_end">
              </div>
              <div class="custom-form-control">
                <label>Term end</label>
                <input type="date" class="form-control" name="term_end">
              </div>
            </form>


            <table id="order-table"  class="table main-table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>Term</th>
                  <th>Registration end</th>
                  <th>Grading start</th>
                  <th>Grading end</th>
                  <th>Term end</th>
                  <th>Actions</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody class="text-dark">
                @foreach ($terms as $term)
                <tr>
                  <td>{{ $term->name }}</td>
                  <td>{{ $term->registration_end }}</td>
                  <td>{{ $term->grading_start }}</td>
                  <td>{{ $term->grading_end }}</td>
                  <td>{{ $term->term_end }}</td>
                  <td>{{ $term->active ? 'Active' : 'Inactive' }}</td>
                  <td>
                    <a href="{{ route('term.edit', $term->id) }}" class="btn btn-outline-primary">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </main>
@endsection