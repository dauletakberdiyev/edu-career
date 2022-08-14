@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Create new report</h3>

                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
                    </div>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Report created successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="fill-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                        </div>
                        <div class="fill-group">
                            <label>Detail</label>
                            <input type="text" class="form-control" placeholder="Enter details" name="detail" v-model="password">
                        </div>
                        <div class="fill-group">
                            <label>Due date</label>
                            <input type="date" class="form-control" placeholder="Enter due date" name="due_date">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>
@endsection