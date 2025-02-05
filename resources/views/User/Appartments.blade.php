@extends('UserLayout.main')
@push('style')
    <style>
        .apartment-thumbnail-img {
            height: 293px;
            width: 412px;
            object-fit: cover
        }

        body {
            background-color: #F5F5F5;
        }

        .apartment-container {
            background-color: #ffffff;
            padding: 32px;
            border-radius: 22px;
        }

        iframe {
            height: 300px;
            width: 250px;
        }

        .banner-img {
            background-image: url('/assets/images/available_apartment_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }

        .form-control {
            background-color: #c0c0c0;
            border: none;
            width: 50%;
        }

        .form-control::placeholder {
            color: white;
            font-size: 20px;
        }
    </style>
@endpush
@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Available Apartments</p>
            <h2 class="text-center ff-poppins fs-48">
                Serviced Corporate Apartments
            </h2>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-10 col-md-8 mx-auto rounded" id="book-apartment">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3"
                autocomplete="off">
                @csrf
                <div id="book-apartment-searchbar" class="input-group">
                    <input type="text" placeholder="Location" class="form-control" name="location"
                        value="{{ old('location') }}">
                    <input type="text" placeholder="Arrival" required class="form-control" name="checkInDate"
                        value="{{ old('checkInDate') }}" onfocus="(this.type='date')">
                    <input type="text" placeholder="Departure" required class="form-control" name="checkOutDate"
                        value="{{ old('checkOutDate') }}" onfocus="(this.type='date')">
                    <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass" style="color:white;"></i></button>
                </div>
            </form>
        </div>
    </div>
@endpush
@push('footer-cta')
    <div class="container-fluid footer footer-bottom-border" id="footer_bg">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <h4 class="ff-poppins text-light">Why rent a hotel when you enjoy an apartment?</h4>
                <p class="ff-poppins text-light">Feel like home at one of our modern apartments located in the heart of
                    London.
                    Make your own meals, order a
                    take-away, enjoy the space and privacy, just like home.</p>
            </div>
            <div class="col-md-3">
                <a href="#book-apartment" class="footer-search-btn">Search</a>
            </div>
        </div>
    </div>
@endpush


@section('user-main-section')
    <div class="row ff-poppins mt-3">
        {{-- <div id="map" style="height: 500px;"></div> --}}
        @if (count($availableApartments) == 0)
            <p class="text-center">No apartments are available</p>
        @elseif (count($availableApartments) == 1)
            <p class="text-center">
                {{ count($availableApartments) }} apartment is available
            </p>
        @else
            <p class="text-center">
                {{ count($availableApartments) }} apartments are available
            </p>
        @endif
    </div>

    <div class="row mx-auto mt-3 mb-3">
        @foreach ($availableApartments as $rec)
            <div class="col-md-10 mx-auto mb-3 apartment-container">
                <div class="row bg-white rounded d-flex flex-row justify-content-around align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt="{{ $rec->area_name }}"
                            class="img-fluid mt-2 mb-2 rounded apartment-thumbnail-img">
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="ff-poppins fs-24">{{ $rec->area_name }}</h5>
                                <p class="ff-poppins">
                                    <img src="{{ asset('assets/images/locationIcon.png') }}" alt="{{ $rec->area_name }}">
                                    {{ $rec->street_address }}
                                </p>
                            </div>
                            <div>
                                <p class="ff-poppins fw-medium">from €{{ $rec->price }}</p>
                            </div>
                        </div>
                        <p class="ff-poppins">
                            {!! Str::limit($rec->description, 100) !!}
                        </p>
                        <div class="d-flex flex-row justify-content-start">
                            <p class="d-inline ff-poppins">
                                <img src="{{ asset('assets/images/bedroom.png') }}" alt="bedrooms">
                                {{ $rec->total_bedrooms }} Bedrooms
                            </p>
                            <p class="d-inline ff-poppins mx-2">
                                <img src="{{ asset('assets/images/Bathroom.png') }}" alt="bathrooms">
                                {{ $rec->total_bathrooms }} Bathrooms
                            </p>
                            <p class="d-inline ff-poppins mx-2">
                                Area Sq.ft {{ $rec->sqfeet_area }}
                            </p>
                        </div>
                        <a href="{{ route('Detail.View.Apartment', ['id' => $rec->id]) }}"
                            class="btn btn-dark ff-poppins fw-medium">View Apartment</a>
                    </div>
                    <div class="col-md-3">
                        {!! $rec->map_location !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
