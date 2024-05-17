@extends('layouts.app')

@section('content')
@php
    $user = $company->user();
@endphp
<main class="main">
    <div class="container-fluid">
        <div class="page__inner">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('vacancy', ['id' => $company->id]) }}" class="btn btn-outline-primary">Vacancies</a>
            </div>
            <div class="main__title mb-3">{{ $company->name }}</div>

            <div class="d-flex align-items-center mb-4">
                <img src="{{ $company->avatar }}" width="80" height="80" class="profile-img">
            </div>

            <div class="form-group group-profile">
                <label class="mb-0">Email</label>
                <span class="flex9 text-secondary">
                    {{ $company->user->email }}
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
            
            <div class="form-group group-profile">
                <label class="mb-0">Photos</label>
                <div class="row">
                    @foreach ($company->photos as $photo)
                        <div class="col-md-4">
                            <a href="#" class="company-photo" data-toggle="modal" data-target="#companyPhotoModal" data-src="{{ asset('storage/' . $photo->photo_path) }}">
                                <img src="{{ asset('storage/' . $photo->photo_path) }}" class="img-fluid" alt="Company Photo">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            @role('company|admin')
                @if (isset($company->cv))
                    <div class="form-group group-profile">
                        <label class="mb-0">CV</label>
                        <a href="{{ $company->cv }}" download >Click here to download cv</a>
                    </div>
                @else
                    <div class="form-group group-profile">
                        <label class="mb-0">CV</label>
                        <span class="flex9 text-secondary">
                            No CV
                        </span>
                    </div>
                @endif
            @endrole
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="companyPhotoModal" tabindex="-1" role="dialog" aria-labelledby="companyPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyPhotoModalLabel">Company Photos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="company-photo-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($company->photos as $key => $photo)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $photo->photo_path) }}" class="d-block w-100" alt="Company Photo">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var companyPhotos = document.querySelectorAll('.company-photo');
        companyPhotos.forEach(function (photo) {
            photo.addEventListener('click', function (e) {
                e.preventDefault();
                var src = this.getAttribute('data-src');
                var modalImg = document.querySelector('#company-photo-carousel .carousel-inner');
                modalImg.innerHTML = '<div class="carousel-item active"><img src="' + src + '" class="d-block w-100" alt="Company Photo"></div>';
                $('#companyPhotoModal').modal('show');
            });
        });
    });
</script>
@endsection
