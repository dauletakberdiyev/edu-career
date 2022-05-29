@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Add Company</h3>

                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
                    </div>

                <form action="{{ route('company.add.form') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="fill-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name" v-model="email">
                        </div>
                        <div class="fill-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" v-model="lastName">
                        </div>
                        <div class="fill-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" placeholder="Enter description" name="description" v-model="lastName">
                            </textarea>
                        </div>

                        <div class="fill-group">
                            <label>User</label>
                            <select name="user_id" id="faculty">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fill-group">
                            <label>Picture</label>
                            <input type="file" name="avatar" class="form-control-file" accept="image/jpeg,image/png,image/gif">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitStaff">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
@endsection