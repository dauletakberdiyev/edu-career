@extends('layouts.app')

@section('content')
@php  
    $user = Auth::user();
    $registration = $user->registration;
@endphp
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top">
                        <h3 class="page__title">Beta registration</h3>
                        

                        <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
                    </div>
                    <h5 class="page__title">
                            Status: 
                            @if($registration != null)
                                @if($registration->status == 0)
                                    <span class="felx9 text-warning">Pending</span>
                                @elseif($registration->status == 1)
                                    <span class="felx9 text-success">Approved</span>
                                @elseif($registration->status == 2)
                                    <span class="felx9 text-danger">Rejected</span>
                                @endif
                            @else
                                <span class="felx9 text-secondary">Unknown</span>
                            @endif
                        </h5>
                    
                    @if($registration != null)
                    @if($registration->reason != null)
                    <div class="form-group group-profile">
                        <label class="mb-0">Reason</label>
                        <span class="flex9 text-info">
                            {{ $registration->reason }}
                            </span>
                    </div>
                    @endif
                    <div class="form-group group-profile">
                        <label class="mb-0">Comapany</label>
                        <span class="flex9 text-secondary">
                            {{ $registration->vacancy->company->name }}
                            </span>
                    </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Vacancy</label>
              <span class="flex9 text-secondary">
                    {{ $registration->vacancy->title }}
                </span>
            </div>
        
            <div class="form-group group-profile">
              <label class="mb-0">Type</label>
              @if($registration->vacancy->type == 0)
                <span class="flex9 text-secondary">
                    Industrial
                </span>
                @else
                <span class="flex9 text-secondary">
                    Academic
                </span>
                @endif
            </div>
            @if($registration->agreement != null)
            <div class="form-group group-profile">
              <label class="mb-0">Agreement</label>
              <span class="flex9 text-secondary">
              <a href="{{ $registration->agreement }}" download >Click here to download agreement</a>
              </span>
            </div>
            @endif
            @endif
                <form action="{{ route('registration.pending') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="fill-group">
                            <label>Vacancy</label>
                            <select name="vacancy_id" id="faculty" required>
                                @foreach($vacancies as $vacancy)
                                    <option value="{{ $vacancy->id }}">{{ $vacancy->title }} - {{ $vacancy->company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($registration->status != 1)
                        <div class="fill-group">
                            <label>Agreement</label>
                            <input type="file" name="agreement" class="form-control-file" accept="pdf, doc, docx" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary ml-auto align-items-center" @click.prevent="submitStaff">Send</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </main>
@endsection
