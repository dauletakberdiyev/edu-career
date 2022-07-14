@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Edit vacancy</h3>

                       
                    </div>

                    <form action="{{ route('vacancy.edit.form') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $vacancy->id }}">
                        @csrf
                        <div class="fill-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="title" value="{{ $vacancy->title }}">
                        </div>
                        <div class="fill-group">
                            <label>Quota</label>
                            <input type="number" class="form-control" placeholder="Enter the quota" name="quota" value="{{ $vacancy->quota }}">
                        </div>
                        <div class="fill-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" placeholder="Enter description" name="description">
                                {{ $vacancy->description }}
                            </textarea>
                        </div>

                        <div class="fill-group">
                            <label>Faculty</label>
                            <select name="faculty_id" id="faculty">
                                <option value="{{ $vacancy->faculty->id }}">{{ $vacancy->faculty->name }}</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitStaff">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
@endsection