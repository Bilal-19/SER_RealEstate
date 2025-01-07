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

        .neighbourhood-img {
            height: 300px;
            width: 300px;
            object-fit: cover;
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
                <h4 class="ff-poppins text-light">Why rent a hotel when you enjoy an apartment?</h4>
                <p class="ff-poppins text-light">Feel like home at one of our modern apartments located in the heart of
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
                        <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt=""
                            class="img-fluid mt-2 mb-2 rounded apartment-thumbnail-img">
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="ff-poppins fs-24">{{ $rec->area_name }}</h5>
                                <p class="ff-poppins">
                                    <img src="{{ asset('assets/images/locationIcon.png') }}" alt="">
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
                                <img src="{{ asset('assets/images/bedroom.png') }}" alt="">
                                {{ $rec->total_bedrooms }} Bedrooms
                            </p>
                            <p class="d-inline ff-poppins mx-2">
                                <img src="{{ asset('assets/images/Bathroom.png') }}" alt="">
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

    <div class="row">
        <h3 class="fs-36 ff-poppins">Neighbourhood</h3>
    </div>

    <div class="row mb-5">
        <div class="col-md-11 mx-auto">
            @isset($neighborhoodApartment)
                @if (count($neighborhoodApartment) > 4)
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($neighborhoodApartment as $rec)
                                <div class="col-md-3 swiper-slide">
                                    <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt=""
                                        class="img-fluid neighbourhood-img rounded shadow">
                                    <p class="fs-5 text-uppercase mb-0">{{ $rec->area_name }}</p>
                                    <p class="mt-0">
                                        {!! Str::limit($rec->description, 50) !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-slider-button swiper-button-prev"></div>
                        <div class="swiper-slider-button swiper-button-next"></div>

                        <!-- If we need scrollbar -->
                    </div>
                @else
                    <p>Please add minimum five records to view the nearest apartments</p>
                @endif
            @endisset
        </div>
    </div>

    {{-- <script src="https://cdn.gomaps.pro/js/gomaps.js"></script>


    <script>
        function initMap() {
            var map = new GoMaps.Map("map", {
                center: [51.5074, -0.1278],  // Example coordinates
                zoom: 10,
            });

            var locations = @json($locations);  // Pass data from Laravel to JavaScript

            locations.forEach(function(location) {
                new GoMaps.Marker({
                    position: [location.latitude, location.longitude],
                    map: map,
                    title: location.area_name
                });
            });
        }

        window.onload = initMap;
    </script> --}}
@endsection
