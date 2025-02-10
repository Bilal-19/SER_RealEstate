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

        .standard-card {
            height: 100px;
            width: 100px;
        }

        .standard-card img {
            display: block;
            margin: 10px auto;
        }

        .feature-card{
            display: flex;
            flex-direction: row;
        }

        .feature-card img {
            height: 40px;
            width: 40px;
            object-fit: contain;
            margin-right: 15px;
        }

        .feature-card p{
            margin-top: 10px;
        }


        @media screen and (max-width: 768px) {
            .check-availability-container {
                margin: auto;
            }

            .price-container {
                width: fit-content;
            }

            .standard-card {
                margin-top: 20px;
                height: fit-content;
                width: fit-content;
            }

        }
    </style>
@endpush
@section('user-main-section')
    @php
        $numericKeyImages = array_values($images);
    @endphp
    <div class="row mb-5">
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


    <div class="row">
        <div class="col-md-2 ms-auto">
            <a href="" class="brand-btn">
                Add to favourites
                <img src="{{ asset('assets/images/star.png') }}" alt="" class="img-fluid"
                    style="mix-blend-mode: color-burn;">
            </a>
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
                        <p>from £{{ $findApartment->one_bedroom_price }} per night</p>
                    </div>
                    </p>
                </div>

                <div class="col-md-6 price-container">
                    <div>
                        <img src="{{ asset('assets/images/bed_price.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="mx-3">
                        <p class="mb-0">Two Bedroom Apartment</p>
                        <p>from £{{ $findApartment->two_bedroom_price }} per night</p>
                    </div>
                    </p>
                </div>
            </div>

            <h5 class="mt-5">The Apartment</h5>
            <p>{{ $findApartment->description }}</p>

            <h5 class="mt-5">The Neighbourhood</h5>
            <p>{{ $findApartment->neighbourhood_description }}</p>
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
                    <select name="bedrooms" class="form-select ms-auto" onchange="getRoomValue(this.value)">
                        <option value="">Bedrooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <p class="mt-3" id="price-tag"></p>
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

    @php
        $features = [
            ['key' => 'concierge', 'label' => 'Concierge', 'image' => 'concierge.png'],
            ['key' => 'air_conditioning', 'label' => 'Air Conditioning', 'image' => 'air_conditioning.png'],
            ['key' => 'kitchen', 'label' => 'Fully Equipped Kitchen', 'image' => 'equiped_kitchen.png'],
            ['key' => 'pet_friendly', 'label' => 'Pet Friendly', 'image' => 'pet_friendly.png'],
            ['key' => 'parking', 'label' => 'Parking', 'image' => 'parking.png'],
            ['key' => 'personal_safe', 'label' => 'Personal Safe', 'image' => 'personal_safe.png'],
            ['key' => 'washing', 'label' => 'Washing/Dryer', 'image' => 'dryer.png'],
            ['key' => 'elevator', 'label' => 'Elevator in Building', 'image' => 'elevator.png'],
            ['key' => 'private_balcony', 'label' => 'Private Balcony', 'image' => 'private-balcony.png'],
            ['key' => 'dishwasher', 'label' => 'Dishwasher', 'image' => 'dishwasher.png'],
        ];
    @endphp

    <div class="row mt-5">
        <h5 class="mb-4">Property Features</h5>
        @foreach ($features as $feature)
            @if ($findApartment->{$feature['key']} == 'on')
                <div class="col-md-3 mb-3 feature-card">
                    <img src="{{ asset('assets/images/' . $feature['image']) }}" alt="{{ $feature['label'] }}"
                        class="img-fluid">
                        <p>{{ $feature['label'] }}</p>
                </div>
            @endif
        @endforeach
    </div>


    <div class="row mt-5 mb-5">
        <div class="col-md-10 mx-auto text-center">
            <h3 class="fs-48 fs-sm-25">The Sterling Standard</h3>
            <p>Working, relaxing, and living. Our apartments have everything you need to feel at home during your stay.</p>
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center mx-auto">
        @foreach ($fetchAllStandards as $record)
            <div class="col-md col-12 text-center standard-card mb-100">
                <img src="{{ asset('Standards/' . $record->standard_icon) }}" alt="" class="img-fluid">
                <p class="text-center fw-medium text-charcoal-black mt-3">{{ $record->standard_text }}</p>
            </div>
        @endforeach
    </div>

    @push('script')
        <script>
            var paraEl = document.getElementById("price-tag")
            function getRoomValue(a){
                if (a == 1){
                    paraEl.innerHTML = `Price from ${{$findApartment->one_bedroom_price}} + VAT per night`
                } else if (a == 2){
                    paraEl.innerHTML = `Price from ${{$findApartment->two_bedroom_price}} + VAT per night`
                } else {
                    paraEl.innerHTML = `Please select no of bedrooms.`
                }
        }
        </script>
    @endpush
@endsection
