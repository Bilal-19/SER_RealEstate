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

        iframe {
            height: 100%;
            width: 100%;
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

        .w-732 {
            width: 732px;
        }

        .check-availability-container{
            background-color: #ECECEC;
            width: 400px;
            height: fit-content;
            padding: 24px;
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
                <a href="#property-details" class="ff-inter text-dark active-hover">Property Details</a>
            </div>
            <div class="col-md-3">
                <a href="#property-surroundings" class="ff-inter text-dark active-hover">Propery Surroundings</a>
            </div>
            <div class="col-md-3">
                <a href="#property-amenities" class="ff-inter text-dark active-hover">Property Amenities</a>
            </div>
        </div>

        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-md-5 w-732">
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
                    <p class="ff-inter mx-3">
                        Area Sq.ft {{ $findApartment->sqfeet_area }}
                    </p>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row d-flex justify-content-around" id="general-info">
            <div class="col-md-5 w-732">
                {{-- General Information --}}
                <div class="bg-white p-5 shadow mt-3 border-radius-18">
                    <h4 class="fs-20 ff-inter">General Information</h4>
                    <p class="ff-inter">
                        {{ $findApartment->description }}
                    </p>
                </div>

                {{-- Details --}}
                <div class="bg-white p-5 mt-3 shadow border-radius-18">
                    <h5 class="ff-inter">Details</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <p class="ff-inter"><b>Bedrooms: </b>{{ $findApartment->total_bedrooms }}</p>
                            <p class="ff-inter"><b>Price Per Night: </b>${{ $findApartment->price_per_night }}</p>
                        </div>
                        <div class="">
                            <p class="ff-inter"><b>Bathrooms: </b>{{ $findApartment->total_bathrooms }}</p>
                            <p class="ff-inter"><b>Location: </b>{{ $findApartment->street_address }}</p>
                        </div>
                    </div>

                    <div>
                        {!! $findApartment->map_location !!}
                    </div>
                </div>

                {{-- Amenities --}}

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

                {{-- Reviews --}}
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

            <div class="col-md-6 border-radius-18 bg-pale-gray p-5 mt-3 check-availability-container">
                <h4 class="ff-inter fs-20 fw-medium">Check Availability & Book Now</h4>
                <form action="{{ route('Check.Apartment.Availability', ['id' => $findApartment->id]) }}" method="get">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <label class="form-label mb-0 ff-inter">Check In Date: </label>
                            <input type="date" class="form-control ff-inter" name="checkIn" required
                                value="{{ $checkInDate ?? '' }}">
                        </div>
                        <div class="mx-2">
                            <label class="form-label mb-0 ff-inter">Check Out Date: </label>
                            <input type="date" class="form-control ff-inter" name="checkOut" required
                                value="{{ $checkOutDate ?? '' }}">

                        </div>
                    </div>
                    @isset($isAvailable)
                        @if ($isAvailable == true)
                            <p class="availability-text-success ff-inter">
                                <img src="{{ asset('assets/images/success_circle.png') }}" alt="">
                                Apartment is Available
                            </p>
                            <a class="btn btn-light mt-5 w-100 ff-inter"
                                href="{{ route('Booking', [
                                    'id' => $findApartment->id,
                                    'checkIn' => request('checkIn'),
                                    'checkOut' => request('checkOut'),
                                ]) }}">Book
                                Now</a>
                        @elseif ($isAvailable == false)
                            <p class="availability-text-danger ff-inter">Apartment is Not Available</p>
                        @endif
                    @endisset
                    <button class="btn btn-dark mt-3 w-100 ff-inter">Check Availability</button>
                </form>
            </div>
        </div>




        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-md-5 w-732">
                <h4 class="ff-poppins fs-32">Neighbourhood</h4>
            </div>
            <div class="col-md-5"></div>
        </div>

        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-md-5 w-732">
                <h4 class="ff-poppins fs-32">Explore Other Apartments</h4>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-11 mx-auto">
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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-text ff-inter text-uppercase">{{ $item->area_name }}
                                            </h6>
                                            <p class="mb-0 ff-inter">{{ $item->area_name }}</p>
                                        </div>
                                        <div>
                                            <p class="mb-0 ff-inter">from £{{ $item->price }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mt-0 ff-inter"><i class="fa-solid fa-bed"></i>
                                            {{ $item->total_bedrooms }}
                                            bedrooms</p>
                                        <p class="mt-0 ff-inter"><i class="fa-solid fa-bath"></i>
                                            {{ $item->total_bathrooms }}
                                            bathrooms
                                        </p>
                                    </div>
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
