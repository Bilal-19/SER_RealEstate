@extends('UserLayout.main')

@push('style')
    <style>
        .thumbnail-img {
            height: 400px;
            width: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="row mt-3 mx-auto">
        <div class="col-md-12">
            <h3>Our Locations</h3>
            <p>We offer a diverse selection of properties throughout London.</p>
        </div>
    </div>

    @isset($fetchAllLocations)
        <div class="row mx-auto">
            @foreach ($fetchAllLocations as $record)
                <div class="col-md-4 mt-3 mb-5">
                    <img src="{{ asset('Locations/' . $record->thumbnail_img) }}" alt="{{ $record->location }}"
                        class="img-fluid thumbnail-img">
                    <h5 class="mt-2">{{ $record->location }}</h5>
                </div>
            @endforeach
        </div>
    @endisset

@endsection
