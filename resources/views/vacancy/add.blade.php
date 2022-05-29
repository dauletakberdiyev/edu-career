@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Add vacancy</h3>

                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
                    </div>

                    <form action="{{ route('vacancy.add.form') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="company_id" value="{{ Auth::user()->company->id }}">
                        @csrf
                        <div class="fill-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="title" v-model="email" required>
                        </div>
                        <div class="fill-group">
                            <label>Quota</label>
                            <input type="number" class="form-control" placeholder="Enter the quota" name="quota" v-model="lastName" required>
                        </div>
                        <div class="fill-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" placeholder="Enter description" name="description" v-model="lastName" required>
                            </textarea>
                        </div>
                        <div class="fill-group">
                            <label>Type</label>
                            <div class="d-flex">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="type" class="custom-control-input" checked="" value="0" v-model="gender">
                                    <label class="custom-control-label">Industrial</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="type" class="custom-control-input" value="1" v-model="gender">
                                    <label class="custom-control-label">Academic</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitStaff">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
@endsection