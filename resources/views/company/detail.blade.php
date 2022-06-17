@extends('layouts.app')

@section('content')
@php 
    $user = $company->user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('vacancy', ['id' => $company->id]) }}" class="btn btn-outline-primary">Vacancies</a>
            </div>
            <div class="main__title mb-3">{{ $company->name }}</div>
        
            <div class="d-flex align-items-center mb-4">
              <img src="{{ $company->avatar }}" width="80" height="80" class="profile-img">
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Email</label>
              <span class="flex9 text-secondary">
                  {{ $company->user->email }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Address</label>
                <span class="flex9 text-secondary">
                    {{ $company->address }}
                </span>
            </div>
            <div class="form-group group-profile">
              <label class="mb-0">Description</label>
                <span class="flex9 text-secondary">
                    {{ $company->description }}
                </span>
            </div>
        
          </div>
        </div>
      </main>
@endsection