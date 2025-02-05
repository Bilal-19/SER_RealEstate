@extends('UserLayout.main')

@push('style')
    <style>
        #map {
            height: 80%;
            width: 100%;
            border-radius: 6px;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Corporate Stays in {{ $locationName }}</h3>
        </div>

        <div class="row mb-5">
            <div class="col-md-6">
                {{-- <div class="row" id="toggle-div">
                    <div class="col-md-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4">
                                <p>Beds</p>
                            </div>
                            <div class="col-md-8">
                                <button class="brand-btn">Studio</button>
                                <button class="brand-btn">1 Bed</button>
                                <button class="brand-btn">2 Bed</button>
                                <button class="brand-btn">3 Bed</button>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4">
                                <label for="customRange2" class="form-label">Price Per Night</label>
                            </div>
                            <div class="col-md-8">
                                <input type="range" class="form-range" min="0" max="5000" id="customRange2">
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <p>Showing {{ count($filterApartments) }} results</p>
                    </div>
                    <div class="col-md-5">
                        {{-- <button class="brand-btn" id="toggle" onclick="toggleBtn()">Show Filters</button> --}}
                    </div>
                </div>

                <div class="row">
                    @foreach ($filterApartments as $record)
                        <div class="col-md-6">
                            <a href="{{ route('Detail.View.Apartment', ['id' => $record->id]) }}">
                                <img src="{{ asset('Apartment/Thubmbnail/' . $record->featured_image) }}" alt=""
                                    class="img-fluid rounded">
                            </a>
                            <p class="mb-0">{{ $record->street_address }}</p>
                            <p>From €{{ $record->one_bedroom_price }} per night</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div id="map"></div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            // Map initialization
            var map = L.map('map').setView([54.505, -3.0], 1);


            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);

            // Dummy marker data
            var markers = @json($locations);

            var markerBounds = [];

            // Loop through markers and add them to the map
            markers.forEach(function(location) {
                var blackIcon = L.icon({
                    iconUrl: '{{ asset('assets/images/location_pin.png') }}', // Black pointer icon URL
                    iconSize: [25, 25],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                });

                L.marker([location.latitude, location.longitude], {
                        icon: blackIcon
                    }).addTo(map)
                    .bindPopup(location.apartment_name);

                markerBounds.push([location.latitude, location.longitude]);
            });

            map.fitBounds(markerBounds);

            // const toggleDivEl = document.getElementById("toggle-div")

            // function toggleBtn() {
            //     if (toggleDivEl.style.display === "none") {
            //         toggleDivEl.style.display = "block"
            //     } else {
            //         toggleDivEl.style.display = "none"
            //     }
            // }
        </script>
    @endpush
@endsection
