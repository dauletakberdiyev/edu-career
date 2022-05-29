@extends('layouts.app')

@section('content')
@php
    $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="main__title mb-3">Profile</div>
        
            <div class="d-flex align-items-center mb-4">
              <img src="{{ $user->avatar }}" width="80" height="80" class="profile-img">
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Email</label>
              <span class="flex9 text-secondary">
                  {{ $user->email }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">First name</label>
              <span class="flex9 text-secondary">
                    {{ $user->firstname }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Last name</label>
              <span class="flex9 text-secondary">
                {{ $user->lastname }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Faculty</label>
              <span class="flex9 text-secondary">
                {{ $user->faculty->name }}
                  </span>
            </div>
            @if($user->cv != null)
            <div class="form-group group-profile">
              <label class="mb-0">CV</label>
              <span class="flex9 text-secondary">
              <a href="{{ $user->cv }}" download >Click here to download cv</a>
              </span>
            </div>
            @endif
            @php
                $company = $user->company;
            @endphp
            @if($company != null)
            <div class="main__title mb-3">Company: {{ $company->name }}</div>
        
            <div class="d-flex align-items-center mb-4">
              <img src="{{ $company->avatar }}" width="80" height="80" class="profile-img">
            </div>
            <div class="form-group group-profile">
              <label class="mb-0">Name</label>
                <span class="flex9 text-secondary">
                    {{ $company->name }}
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
            @endif
          </div>
        </div>
      </main>
@endsection