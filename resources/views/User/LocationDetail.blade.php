@extends('UserLayout.main')

@push('style')
    <style>
        #map {
            height: 50vh;
            width: 100%;
            border-radius: 6px;
        }

        .apartment-thumbnail {
            height: 300px;
            width: 300px;
            object-fit: cover;
        }

        .flex-div{
            display: flex;
            flex-direction: row;
        }

        @media screen and (max-width: 768px) {
            #map {
                height: 80%;
                width: 100%;
                border-radius: 6px;
            }

            .flex-div{
                flex-direction: column-reverse;
            }
        }
    </style>
@endpush

@section('user-main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Corporate Stays in {{ $locationName }}</h3>
        </div>

        <div class="row mb-5 flex-div">
            <div class="col-md-6">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <p>Showing {{ count($filterApartments) }} results</p>
                    </div>
                </div>

                <div class="row">
                    @foreach ($filterApartments as $record)
                        <div class="col-md-6">
                            <a href="{{ route('Detail.View.Apartment', ['id' => $record->id]) }}">
                                <img src="{{ asset('Apartment/Thubmbnail/' . $record->featured_image) }}" alt=""
                                    class="img-fluid rounded apartment-thumbnail">
                            </a>
                            <p class="mb-0">{{ $record->street_address }}</p>
                            <p>From €{{ $record->one_bedroom_price }} per night</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-12">
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

        </script>
    @endpush
@endsection
