@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top">
                <h3 class="page__title">Profile</h3>
                <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
            </div>
        
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
          </div>
        </div>
      </main>
@endsection