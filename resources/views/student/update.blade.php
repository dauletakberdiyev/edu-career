@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Update student</h3>

                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
                    </div>

                    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" type="hidden" value="{{ $user->id }}">
                        <div class="fill-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" v-model="email" value="{{ $user->email }}">
                        </div>
                        <div class="fill-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" v-model="firstName" value="{{ $user->firstname }}">
                        </div>
                        <div class="fill-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" v-model="lastName" value="{{ $user->lastname }}">
                        </div>

                        <div class="fill-group">
                            <label>Faculty</label>
                            <select name="faculty_id" id="faculty">
                                <option value="{{ $user->faculty_id }}">{{ $user->faculty->name }}</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fill-group">
                            <label>Role</label>
                            <select name="role" id="role">
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fill-group">
                            <label>Gender</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="male" name="gender" class="custom-control-input" checked="" value="Male" v-model="gender">
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="female" name="gender" class="custom-control-input" value="Female" v-model="gender">
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="fill-group">
                            <label>Picture</label>
                            <input type="file" name="avatar" class="form-control-file" accept="image/jpeg,image/png,image/gif">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitstudent">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
@endsection