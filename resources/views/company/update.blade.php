@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Update Company</h3>

                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
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