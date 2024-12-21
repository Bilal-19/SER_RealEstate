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
        }

        #map {
            height: 200px;
            width: 80%;
            border: 1px solid black;
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
        <div class="col-md-9 mx-auto rounded bg-white">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3">
                @csrf
                <div class="row d-flex justify-content-around align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-bold mb-0">Search By Area:</label>
                        <input type="text" placeholder="SEARCH BY AREA" class="form-control" name="location">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold mb-0">Check In:</label>
                        <input type="date" placeholder="CHECK IN" required class="form-control" name="checkInDate">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold mb-0">Check Out:</label>
                        <input type="date" placeholder="CHECK OUT" required class="form-control" name="checkOutDate">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit">SEARCH</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endpush
@push('footer-cta')
    <div class="container-fluid footer footer-bottom-border" id="footer_bg">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <h4 class="ff-inter text-light">Why rent a hotel when you enjoy an apartment?</h4>
                <p class="ff-inter text-light">Feel like home at one of our modern apartments located in the heart of
                    London.
                    Make your own meals, order a
                    take-away, enjoy the space and privacy, just like home.</p>
            </div>
            <div class="col-md-3">
                <a href="" class="footer-search-btn">Search</a>
            </div>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row">
        <p>
            {{ count($availableApartments) }} records found
        </p>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto" id="map">

        </div>
    </div>
    <div class="row mx-auto mt-3 mb-3">
        @foreach ($availableApartments as $rec)
            <div class="col-md-10 mx-auto mb-3 apartment-container">
                <div class="row bg-white rounded d-flex flex-row justify-content-around align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt=""
                            class="img-fluid mt-2 mb-2 rounded apartment-thumbnail-img">
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="ff-inter fs-24">{{ $rec->area_name }}</h5>
                                <p class="ff-inter">
                                    <img src="{{ asset('assets/images/locationIcon.png') }}" alt="">
                                    {{ $rec->street_address }}
                                </p>
                            </div>
                            <div>
                                <p class="ff-inter fw-medium">from ${{ $rec->price }}</p>
                            </div>
                        </div>
                        <p class="ff-inter">{{ $rec->description }}</p>
                        <div class="d-flex flex-row justify-content-start">
                            <p class="d-inline ff-inter">
                                <img src="{{ asset('assets/images/bedroom.png') }}" alt="">
                                {{ $rec->total_bedrooms }} Bedrooms
                            </p>
                            <p class="d-inline ff-inter mx-3">
                                <img src="{{ asset('assets/images/Bathroom.png') }}" alt="">
                                {{ $rec->total_bathrooms }} Bathrooms
                            </p>
                        </div>
                        <a href="{{ route('Detail.View.Apartment', ['id' => $rec->id]) }}"
                            class="btn btn-dark ff-inter fw-medium">View Apartment</a>
                    </div>
                    <div class="col-md-3">
                        {!! $rec->map_location !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script>
        function showMap(lat, long) {
            var coordinate = {
                lat: lat,
                lng: long
            }

            new google.maps.Maps(
                document.getElementById("map"), {
                    zoom: 10,
                    center: coordinate
                }
            )
        }

        showMap(25.2048, 55.2708)
    </script>
@endsection
