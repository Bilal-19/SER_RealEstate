@extends('UserLayout.main')
@push('style')
    <style>
        body {
            background-color: #fafafa
        }


        input[type="date"] {
            width: 86%;
        }

        .availability-text-success {
            background-color: #B3F9C6;
            color: #197D29;
            font-size: 15px;
            border-radius: 27px;
            padding: 4px 8px;
            display: inline;
        }

        .availability-text-danger {
            background-color: red;
            color: white;
            font-size: 15px;
            border-radius: 27px;
            padding: 4px 8px;
            display: inline;
        }

        .check-availability-container {
            background-color: #ECECEC;
            width: 420px;
            height: fit-content;
            padding: 24px;
        }

        .apartment-img-slides {
            height: 500px;
            width: 500px;
            object-fit: cover;
            border-radius: 6px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
            padding: 15px;
            border-radius: 6px;
        }

        .price-container {
            width: fit-content;
            display: flex;
            justify-content: space-between;
        }

        @media screen and (max-width: 768px) {
            .check-availability-container {
                margin: auto;
            }

            .price-container {
                width: fit-content;
            }
        }
    </style>
@endpush
@section('user-main-section')
    @php
        $numericKeyImages = array_values($images);
    @endphp
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        @foreach ($numericKeyImages as $index => $item)
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($numericKeyImages as $index => $item)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ URL::to($item) }}" alt="apartments images"
                                    class="img-fluid d-block w-100 apartment-img-slides">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-8">
                <h4 class="mb-5">{{ $findApartment->apartment_name }}</h4>
                <div class="row">
                    <div class="col-md-6 price-container">
                        <div>
                            <img src="{{ asset('assets/images/bed_price.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div>
                            <p class="mb-0">One Bedroom Apartment</p>
                            <p>from €{{ $findApartment->one_bedroom_price }} per night</p>
                        </div>
                        </p>
                    </div>

                    <div class="col-md-6 price-container">
                        <div>
                            <img src="{{ asset('assets/images/bed_price.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <div>
                            <p class="mb-0">Two Bedroom Apartment</p>
                            <p>from €{{ $findApartment->two_bedroom_price }} per night</p>
                        </div>
                        </p>
                    </div>
                </div>

                <p>
                    {{$findApartment->description}}
                </p>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    @endsection
