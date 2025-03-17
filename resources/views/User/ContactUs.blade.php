@extends('UserLayout.main')
@push('canonical-tag')
    <link rel="canonical" href="https://sterling-executive.com/contact-us">
@endpush
@push('style')
    <style>
        .enquiry-card img {
            height: 100px;
            width: 100px;
            object-fit: contain;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-sm-200 mt-150">
        <div class="row mt-50 mx-auto mt-100">
            <div class="col-md-12 text-center">
                <h3 class="fs-48 fs-sm-25">Contact Us</h3>
            </div>
        </div>

        <div class="row mt-5 text-center d-flex justify-content-center align-items-center">
            <div class="col-md-1 enquiry-card mx-3">
                <a href="{{ route('Booking.Enquiry') }}">
                    <img src="{{ asset('assets/images/booking-enquiry.webp') }}" alt="Booking Enquiry Icon" class="img-fluid">
                </a>
                <p>Booking Enquiries</p>
            </div>
            <div class="col-md-1 enquiry-card mx-3">
                <a href="{{ route('General.Enquiry') }}">
                    <img src="{{ asset('assets/images/general-enquiry.webp') }}" alt="General Enquiry Icon" class="img-fluid">
                </a>
                <p>General Enquiries</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p class="mb-0">Sterling Executive Residential,</p>
                <p class="mb-0">20 Wenlock Road,</p>
                <p class="mb-0">London, England,</p>
                <p>N1 7GU</p>
                <p>07554 359975</p>
            </div>
        </div>

        @php
            function calcStars($numFill, $numBlank)
            {
                return str_repeat('<i class="fa-solid fa-star"></i>', $numFill) .
                    str_repeat('<i class="fa-regular fa-star"></i>', $numBlank);
            }
        @endphp


        <div class="row feedback-bg mt-5 mb-5 p-5 text-center text-white">
            <div class="col-md-12 rounded">
                <div id="feedback" class="carousel slide">
                    <div class="carousel-inner" data-bs-ride="carousel" data-bs-interval="3000">
                        <h5 class="text-start">Your go to service since 2025</h5>

                        @foreach ($fetchAllTestimonials as $record)
                            <div class="col-5 carousel-item text-start mt-5 {{ $record->id == 1 ? 'active' : '' }}">
                                <h5 class="col-12 col-md-12 fw-bold">“{{ $record->message }}”</h5>
                                <p class="mt-5 mb-2">{{ $record->name }}</p>
                                <p class="mb-5">{!! calcStars($record->rating, 5 - $record->rating) !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
