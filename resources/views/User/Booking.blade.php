@extends('UserLayout.main')
@push('style')
    <style>
        body {
            background-color: #fafafa;
        }

        .banner-img {
            background-image: url('/assets/images/available_apartment_banner.png');
            background-size: cover;
        }
    </style>
@endpush
@push('CTA')
    <div class="row mt-5 mb-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Apartment Name</p>
            <h2 class="text-center ff-poppins fs-48">
                Booking Page
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around">
            <div class="col-md-5 rounded bg-white">

            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
@endsection
