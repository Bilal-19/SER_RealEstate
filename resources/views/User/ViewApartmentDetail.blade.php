@extends('UserLayout.main')
@push('style')
    <style>
        body {
            background-color: #fafafa
        }

        .apartment-swiper,
        {
        width: 100%;
        }

        .swiper-slide {
            /* width: 299px; */
            /* height: 269px; */
            margin-top: 20px;
            margin-bottom: 20px;
            margin-right: 10px;
        }

        .swiper .swiper-pagination-bullet {
            background: #b1895a;
            height: 10px;
            width: 10px;
            opacity: 0.8;
        }

        .swiper .swiper-pagination-bullet-active {
            opacity: 1;
            background: #b1895a;
            height: 10px;
            width: 10px;
        }

        .swiper .swiper-slider-button {
            height: 50px;
            width: 50px;
            border-radius: 12px;
            color: #b1895a;
            border: none;
            background-color: black;
            padding: 10px;
        }

        .swiper-slide>img {
            height: 349px;
            width: 299px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .active,
        active-hover:hover {
            padding-bottom: 10px;
            width: 100%;
            border-bottom: 1px solid black;
        }
    </style>
@endpush
@section('user-main-section')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($images as $item)
                            <div class="swiper-slide">
                                <img src="{{ URL::to($item) }}" alt="" class="img-fluid d-block">
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <button class="swiper-slider-button swiper-button-prev"></button>
                    <div class="swiper-slider-button swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-3">
                <a href="#general-info" class="ff-inter text-dark active">General Information</a>
            </div>
            <div class="col-md-3">
                <a href="" class="ff-inter text-dark active-hover">Property Details</a>
            </div>
            <div class="col-md-3">
                <a href="" class="ff-inter text-dark active-hover">Propery Surroundings</a>
            </div>
            <div class="col-md-3">
                <a href="" class="ff-inter text-dark active-hover">Property Amenities</a>
            </div>
        </div>

        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-md-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="fs-32 ff-inter fw-medium">{{ $findApartment->area_name }}</h4>
                        <p class="fs-18 ff-inter">
                            <img src="{{ asset('assets/images/locationIcon.png') }}" alt="">
                            {{ $findApartment->street_address }}
                        </p>
                    </div>
                    <div>
                        <p class="fs-24 ff-inter fw-medium">from ${{ $findApartment->price }}</p>
                    </div>
                </div>
                <hr>
                <div class="d-flex">
                    <p class="ff-inter">
                        <img src="{{ asset('assets/images/bedroom.png') }}" alt="">
                        {{ $findApartment->total_bedrooms }} Bedrooms
                    </p>
                    <p class="ff-inter mx-3">
                        <img src="{{ asset('assets/images/Bathroom.png') }}" alt="">
                        {{ $findApartment->total_bathrooms }} Bathrooms
                    </p>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-5">
                <div class="bg-white p-5 shadow mt-3 border-radius-18" id="general-info">
                    <h4 class="fs-20 ff-inter">General Information</h4>
                    <p class="ff-inter">
                        {{ $findApartment->description }}
                    </p>
                </div>
            </div>

            <div class="col-md-5 border-radius-18 bg-pale-gray p-5 mt-3">
                <h4 class="ff-inter fs-20 fw-medium">Check Availability & Book Now</h4>
                <form action="">
                    <div class="d-flex justify-content-between">
                        <div>
                            <label class="form-label mb-0 ff-inter">Check In Date: </label>
                            <input type="date" class="form-control ff-inter">
                        </div>
                        <div>
                            <label class="form-label mb-0 ff-inter">Check Out Date: </label>
                            <input type="date" class="form-control ff-inter">
                        </div>
                    </div>
                    <button class="btn btn-dark mt-3 w-100 ff-inter">Check Availability</button>
                </form>
            </div>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-5">
                <div class="bg-white p-5 mt-3 shadow border-radius-18">
                    <h5 class="ff-inter">Details</h5>
                    <div class="d-flex justify-content-between">
                        <p class="ff-inter"><b>Bedrooms: </b>{{ $findApartment->total_bedrooms }}</p>
                        <p class="ff-inter"><b>Bathrooms: </b>{{ $findApartment->total_bathrooms }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="ff-inter"><b>Price Per Night: </b>${{ $findApartment->price_per_night }}</p>
                        <p class="ff-inter"><b>Location: </b>{{ $findApartment->street_address }}</p>
                    </div>

                    <div>
                        {!! $findApartment->map_location !!}
                    </div>
                </div>
            </div>

            <div class="col-md-5"></div>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-5">
                <div class="bg-white mt-3 shadow border-radius-18 p-5">
                    <h5 class="fs-20 ff-inter">Amenities</h5>
                    <div class="d-flex justify-content-between">
                        <div>
                            @foreach ($firstFourAmenities as $val)
                                <p class="ff-inter standard-amenity fs-15">
                                    <img src="{{ asset('Benefits/' . $val->benefit_icon) }}" alt="">
                                    <span class="mx-1 ff-inter">{{ $val->benefit_text }}</span>
                                </p>
                            @endforeach
                        </div>

                        <div class="mx-2">
                            @foreach ($LastFourAmenities as $val)
                                <p class="ff-inter standard-amenity fs-15">
                                    <img src="{{ asset('Benefits/' . $val->benefit_icon) }}" alt="">
                                    <span class="mx-1 ff-inter">{{ $val->benefit_text }}</span>
                                </p>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-5">
                <div class="bg-white border-radius-18 p-5 mt-3 shadow">
                    <h4 class="ff-inter fs-20 fw-medium">Reviews</h4>
                    <div class="reviews-style">
                        <div class="col-md-5">
                            <p class="d-flex justify-content-between mb-0 fs-15 ff-inter fw-medium">
                                <span>Cleanliness</span>
                                <span>{{ $findApartment->cleanlinessVal }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->cleanlinessVal * 10 }}%"
                                    aria-valuenow="{{ $findApartment->cleanlinessVal }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <p class="d-flex justify-content-between mb-0 mt-3 fs-15 ff-inter fw-medium">
                                <span>Comfort</span>
                                <span>{{ $findApartment->comfortVal }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->comfortVal * 10 }}%"
                                    aria-valuenow="{{ $findApartment->comfortVal }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <p class="d-flex justify-content-between mb-0 mt-3 fs-15 ff-inter fw-medium">
                                <span>Facilities</span>
                                <span>{{ $findApartment->facilitiesVal }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->facilitiesVal * 10 }}%"
                                    aria-valuenow="{{ $findApartment->facilitiesVal }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <p class="d-flex justify-content-between mb-0 mt-3 fs-15 ff-inter fw-medium">
                                <span>Location</span>
                                <span>{{ $findApartment->locationVal }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->locationVal * 10 }}%"
                                    aria-valuenow="{{ $findApartment->locationVal }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <p class="d-flex justify-content-between mb-0 mt-3 fs-15 ff-inter fw-medium">
                                <span>Staff</span>
                                <span>{{ $findApartment->staffVal }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->staffVal * 10 }}%"
                                    aria-valuenow="{{ $findApartment->staffVal }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <p class="d-flex justify-content-between mb-0 mt-3 fs-15 ff-inter fw-medium">
                                <span>Value for money</span>
                                <span>{{ $findApartment->value_for_money }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->value_for_money * 10 }}%"
                                    aria-valuenow="{{ $findApartment->value_for_money }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>

                            <p class="d-flex justify-content-between mb-0 mt-3 fs-15 ff-inter fw-medium">
                                <span>Free Wifi</span>
                                <span>{{ $findApartment->free_wifi_val }}</span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" aria-label="Basic example"
                                    style="width: {{ $findApartment->free_wifi_val * 10 }}%"
                                    aria-valuenow="{{ $findApartment->free_wifi_val }}" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-md-5">
                <h4 class="ff-poppins fs-32">Neighbourhood</h4>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-md-5">
                <h4 class="ff-poppins fs-32">Explore Other Apartments</h4>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row">

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (count($apartments) < 5)
                    <p class="ff-inter text-center">
                        Please add minimum five apartments to view the slider.
                    </p>
                @else
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($apartments as $item)
                                <div class="swiper-slide">
                                    <img src="{{ asset('Apartment/Thubmbnail/' . $item->featuredImage) }}" alt=""
                                        class="img-fluid d-block">
                                </div>
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <button class="swiper-slider-button swiper-button-prev"></button>
                        <div class="swiper-slider-button swiper-button-next"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
