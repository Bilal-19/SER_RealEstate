@extends('UserLayout.main')
@push('style')
    <style>
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
            height: 50px;
            width: 50px;
        }

        .check-availability-container {
            width: fit-content;
            height: fit-content;
            padding: 20px;
        }

        .check-availability-container input,
        .check-availability-container select {
            background-color: #c0c0c0;
            width: fit-content;
            box-sizing: border-box;
            min-width: 250px;
        }

        .check-availability-container input::placeholder,
        .check-availability-container select {
            color: white;
        }

        .check-availability-container select {
            width: fit-content;
        }

        .check-availability-container button {
            display: block;
            margin-top: 15px;
            background-color: #c0c0c0;
            color: white;
            padding: 8px 10px;
            border: none;
            border-radius: 5px;
        }

        .availability-text-success {
            background-color: #B3F9C6;
            color: #197D29;
            font-size: 15px;
            border-radius: 27px;
            padding: 4px 8px;
            display: inline;
            margin-top: 10px !important;
        }

        .availability-text-danger {
            background-color: red;
            color: white;
            font-size: 15px;
            border-radius: 27px;
            padding: 4px 8px;
            display: inline;
        }

        .price-container {
            width: fit-content;
            display: flex;
            justify-content: space-between;
        }

        .book-now-btn {
            color: white;
            background-color: #c0c0c0;
            display: block;
            width: fit-content;
            margin-top: 15px;
            padding: 10px 12px;
            border-radius: 5px;
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
        <div class="col-md-7">
            <h4 class="mb-5">{{ $findApartment->apartment_name }}</h4>
            <div class="row">
                <div class="col-md-6 price-container">
                    <div>
                        <img src="{{ asset('assets/images/bed_price.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="mx-3">
                        <p class="mb-0">One Bedroom Apartment</p>
                        <p>from €{{ $findApartment->one_bedroom_price }} per night</p>
                    </div>
                    </p>
                </div>

                <div class="col-md-6 price-container">
                    <div>
                        <img src="{{ asset('assets/images/bed_price.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="mx-3">
                        <p class="mb-0">Two Bedroom Apartment</p>
                        <p>from €{{ $findApartment->two_bedroom_price }} per night</p>
                    </div>
                    </p>
                </div>
            </div>

            <p>{{ $findApartment->description }}</p>
        </div>

        <div class="col-md-2 mt-3 check-availability-container">
            <form action="{{ route('Check.Apartment.Availability', ['id' => $findApartment->id]) }}" method="get">
                <p class="mb-0 text-center">minimum stay restrictions may apply</p>
                <div class="input-group">
                    <input type="text" class="form-control" name="checkIn" required value="{{ $checkInDate ?? '' }}"
                        onfocus="(this.type='date')" placeholder="Check In">
                    <input type="text" class="form-control" name="checkOut" required value="{{ $checkOutDate ?? '' }}"
                        onfocus="(this.type='date')" placeholder="Check Out">
                </div>
                <div class="mt-3">
                    <select name="bedrooms" class="form-select ms-auto">
                        <option value="">Bedrooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <button class="ms-auto">Check Availability</button>
                @isset($isAvailable)
                    @if ($isAvailable == true)
                        <p class="availability-text-success ff-poppins">
                            <img src="{{ asset('assets/images/success_circle.png') }}" alt="availability check">
                            Apartment is Available
                        </p>
                        <a class="book-now-btn ms-auto"
                            href="{{ route('Booking', [
                                'id' => $findApartment->id,
                                'checkIn' => request('checkIn'),
                                'checkOut' => request('checkOut'),
                                'bedrooms' => request('bedrooms'),
                            ]) }}">Book
                            Now</a>
                    @elseif ($isAvailable == false)
                        <p class="availability-text-danger">Apartment is Not Available</p>
                    @endif
                @endisset
            </form>
        </div>
    </div>

    <div class="row">
        <h5>Property Features</h5>
        <div class="col-md-3">
            <p>
                @if ($findApartment->concierge == 'on')
                    <span>
                        <img src="{{ asset('assets/images/concierge.jpg') }}" alt="concierge" class="img-fluid mr-2">
                        <span>Concierge</span>
                    </span>
                @endif
            </p>

            <p>
                @if ($findApartment->parking == 'on')
                    <span>
                        <img src="{{ asset('assets/images/parking.jpg') }}" alt="free parking" class="img-fluid mr-2">
                        <span>Parking</span>
                    </span>
                @endif
            </p>

            <p>
                @if ($findApartment->elevator == 'on')
                    <span>
                        <img src="{{ asset('assets/images/elevator.jpg') }}" alt="elevator" class="img-fluid mr-2">
                        <span>Elevator in Building</span>
                    </span>
                @endif
            </p>
        </div>

        <div class="col-md-3">
            <p>
                @if ($findApartment->air_conditioning == 'on')
                    <span>
                        <img src="{{ asset('assets/images/air_conditioning.jpg') }}" alt="air conditioner"
                            class="img-fluid mr-2">
                        <span>Air Conditioning</span>
                    </span>
                @endif
            </p>

            <p>
                @if ($findApartment->personal_safe == 'on')
                    <span>
                        <img src="{{ asset('assets/images/personal_safe.jpg') }}" alt="personal safe"
                            class="img-fluid mr-2">
                        <span>Personal Safe</span>
                    </span>
                @endif
            </p>

            <p>
                @if ($findApartment->private_balcony == 'on')
                    <span>
                        <img src="{{ asset('assets/images/private_balcony.jpg') }}" alt="private balcony"
                            class="img-fluid mr-2">
                        <span>Private Balcony</span>
                    </span>
                @endif
            </p>
        </div>

        <div class="col-md-3">
            <p>
                @if ($findApartment->kitchen == 'on')
                    <span>
                        <img src="{{ asset('assets/images/equiped_kitchen.png') }}" alt="Full equipped kitchen"
                            class="img-fluid mr-2">
                        <span>Fully Equipped Kitchen</span>
                    </span>
                @endif
            </p>

            <p>
                @if ($findApartment->washing == 'on')
                    <span>
                        <img src="{{ asset('assets/images/washing.jpg') }}" alt="washing" class="img-fluid mr-2">
                        <span>Washing/Dryer</span>
                    </span>
                @endif
            </p>

            <p>
                @if ($findApartment->dishwasher == 'on')
                    <span>
                        <img src="{{ asset('assets/images/elevator.jpg') }}" alt="dishwasher" class="img-fluid mr-2">
                        <span>Dishwasher</span>
                    </span>
                @endif
            </p>
        </div>

        <div class="col-md-3">
            <p>
                @if ($findApartment->pet_friendly == 'on')
                    <span>
                        <img src="{{ asset('assets/images/pet_friendly.jpg') }}" alt="dishwasher"
                            class="img-fluid mr-2">
                        <span>Pet Friendly</span>
                    </span>
                @endif
            </p>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-10 mx-auto text-center">
            <h3>The Sterling Standard</h3>
            <p>Working, relaxing, and living. Our apartments have everything you need to feel at home during your stay.</p>
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center">
        @foreach ($fetchAllStandards as $record)
            <div class="col-md-1 col-8 text-center">
                <img src="{{ asset('Standards/' . $record->standard_icon) }}" alt="" class="img-fluid">
                <p>{{ $record->standard_text }}</p>
            </div>
        @endforeach
    </div>
@endsection
