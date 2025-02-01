@extends('UserLayout.main')


@section('user-main-section')
    <div class="row">
        <h3 class="text-center">Contact Us</h3>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 mx-auto d-flex justify-content-around">
            <a href="">
                <img src="{{ asset('assets/images/booking-enquiry.jpg') }}" alt="" class="img-fluid">
            </a>
            <a href="">
                <img src="{{ asset('assets/images/general-enquiry.jpg') }}" alt="" class="img-fluid">
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <p class="mb-0">Office Number/Name ,</p>
            <p class="mb-0">Street, </p>
            <p class="mb-0">London,</p>
            <p>HAXX 2XX</p>
            <p>079 2191 9426</p>
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
                <div class="carousel-inner" data-bs-ride="carousel" data-bs-interval="10000">
                    <h5 class="text-start">Your go to service since 2025</h5>

                    @foreach ($fetchAllTestimonials as $record)
                        <div class="col-5 carousel-item text-start mt-5 {{ $record->id == 1 ? 'active' : '' }}">
                            <h5 class="col-md-12 col-12 fw-bold">“{{ $record->message }}”</h5>
                            <p class="mb-0">{!! calcStars($record->rating, 5 - $record->rating) !!}</p>
                            <p>{{ $record->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
