@extends('UserLayout.main')

@push('style')
    <style>
        .accordion-button {
            background-color: transparent !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: transparent !important;
        }

        .accordion-item {
            border-bottom: 1px solid #c0c0c0;
            border-top: none;
            border-left: none;
            border-right: none;
            color: #303030 !important;
        }

        .accordion-button:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        /* Removed dropdown like icon */
        .accordion-button::after {
            display: none;
        }

        .accordion-header > button{
            color: #303030 !important;
            font-weight: 500;
            font-size: 18px;
        }

        .sterling-experience-img {
            border-radius: 16px;
        }

        .standard-img{
            height: fit-content;
            width: fit-content;
            object-fit: cover;
        }

        .style-experience-text{
            line-height: 1.2;
            letter-spacing: 0.8px;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-100 mt-sm-75">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/sterling-experience.png') }}" alt=""
                    class="img-fluid sterling-experience-img">
            </div>
            <div class="col-md-5">
                <h3 class="fs-48 fs-sm-25">The Sterling Experience</h3>
                <p class="mt-20 style-experience-text">
                    We understand when staying in one of our apartments, you're often far from home, so whether it's
                    offering
                    advice on your local area, or getting a special request delivered to your apartment, our 24/7 Guest
                    Relations Team is always on hand to help.
                </p>
                <p class="style-experience-text">
                    Planning to stay with us? Take a look at our guest journey below to understand how our team look after
                    you
                    every step of the way.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row mb-5">
            <div class="col-md-10 mx-auto text-center">
                <h3 class="fs-48 fs-sm-25">The Sterling Standard</h3>
                <p>Working, relaxing, and living. Our apartments have everything you need to feel at home during your stay.
                </p>
            </div>
        </div>

        <div class="row d-flex justify-content-around align-items-center">
            @foreach ($fetchAllStandards as $record)
                <div class="col-md-1 col-8">
                    <img src="{{ asset('Standards/' . $record->standard_icon) }}" alt="" class="img-fluid standard-img">
                    <p class="text-center fw-medium text-charcoal-black">{{ $record->standard_text }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <h3 class="fs-48 fs-sm-25">Booking FAQs</h3>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-md-11 mx-auto" id="booking-faq">
                <div class="accordion" id="accordionExample">
                    @foreach ($fetchAllFAQs as $record)
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $record->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $record->id }}">
                                    {{ $record->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $record->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">{!! $record->answer !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-11 mx-auto text-center">
                <a href="{{ route('FAQs') }}" class="text-dark">Show more</a>
            </div>
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
                            <p class="mb-0">{!! calcStars($record->rating, 5 - $record->rating) !!}</p>
                            <p>{{ $record->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
