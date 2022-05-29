@extends('layouts.app')

@section('content')
@php 
    $user = Auth::user();
@endphp
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            

            <form method="post" enctype="multipart/form-data" action="{{ route('user.update') }}">
              <div class="d-flex justify-content-between mb-4">
                  <h3 class="page__title">Edit profile</h3>
                  <button type="submit" class="btn btn-outline-primary">Save</button>
              </div>
              <div class="d-flex align-items-center mb-4">
                <img src="{{ $user->avatar }}" width="80" height="80" class="profile-img">
              </div>
              @csrf
              <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="custom-form-control">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $user->email }}" disabled="disabled">
              </div>
              <div class="custom-form-control">
        
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" value="{{ $user->firstname }}">
              </div>
              <div class="custom-form-control">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="{{ $user->lastname }}">
              </div>
              <div class="custom-form-control">
                <label>Picture</label>
                <input type="file" class="form-control-file" name="avatar" accept="image/jpeg,image/png,image/gif">
              </div>

              @if($user->cv != null) 
              <div class="custom-form-control">
                <div class="form-group group-profile">
                    <label class="mb-0">Your CV</label>
                    <a href="{{ $user->cv }}" download >Click here to download your cv</a>
                </div>     
              </div>   
              @endif
              @role('student')
              <div class="custom-form-control">
                  <label>CV</label>
                  <input type="file" class="form-control-file" name="cv" accept="pdf,doc,docx">
              </div>
              @endrole
            </form>
        
            @role('company')
            @php 
              $company = $user->company;
            @endphp
                    
                    <div class="page__top">
                        <h3 class="page__title">Update Company</h3>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                      <img src="{{ $company->avatar }}" width="80" height="80" class="profile-img">
                    </div>

                    <form action="{{ route('company.update.form') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" type="hidden" value="{{ $company->id }}">
                        <div class="fill-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" v-model="firstName" value="{{ $company->name }}">
                        </div>
                        <div class="fill-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" v-model="lastName" value="{{ $company->address }}">
                        </div>
                        <div class="fill-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" placeholder="Enter Description" name="description" v-model="lastName">
                                {{ $company->description }}
                            </textarea>
                        </div>
                        <div class="fill-group">
                            <label>Logo</label>
                            <input type="file" name="company_avatar" class="form-control-file" accept="image/jpeg,image/png,image/gif">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitStaff">Save</button>
                        </div>

                    </form>
            @endrole
          </div>
        </div>
      </main>
@endsection