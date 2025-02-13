@extends('UserLayout.main')

@push('style')
    <style>
        #map {
            height: 100%;
            width: 100%;
            border-radius: 6px;

        }

        .apartment-thumbnail {
            height: 300px;
            width: 300px;
            object-fit: cover;
        }

        .flex-div {
            display: flex;
            flex-direction: row;
        }

        .mt-100{
            margin-top: 100px;
        }

        @media screen and (max-width: 768px) {
            #map {
                height: 80%;
                width: 100%;
                border-radius: 6px;
                display: block;
            }

            .flex-div {
                flex-direction: column-reverse;
            }
        }
    </style>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-150 mt-sm-200">
        <div class="row">
            <h3 class="fs-48 fs-sm-25">Corporate Stays in {{ $locationName }}</h3>
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
                        <div class="col-md-6 col-12">
                            <a href="{{ route('Detail.View.Apartment', ['id' => $record->id]) }}">
                                <img src="{{ asset('Apartment/Thubmbnail/' . $record->featured_image) }}" alt="{{$record->apartment_name}}"
                                    class="img-fluid rounded apartment-thumbnail">
                            </a>
                            <p class="mb-0">{{ $record->street_address }}</p>
                            <p class="fs-14">From £{{ $record->one_bedroom_price }} per night</p>
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
            document.addEventListener('DOMContentLoaded', function() {
                var map = L.map('map').setView([54.505, -3.0], 1);

                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
                    subdomains: 'abcd',
                    maxZoom: 19
                }).addTo(map);

                var markers = @json($locations);
                var markerBounds = [];

                markers.forEach(function(location) {
                    var blackIcon = L.icon({
                        iconUrl: '{{ asset('assets/images/location_pin.png') }}',
                        iconSize: [25, 25],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                    });

                    L.marker([location.latitude, location.longitude], {
                            icon: blackIcon
                        })
                        .addTo(map)
                        .bindPopup(location.apartment_name);

                    markerBounds.push([location.latitude, location.longitude]);
                });

                if (markerBounds.length > 0) {
                    map.fitBounds(markerBounds);
                }

                setTimeout(function() {
                    map.invalidateSize();
                }, 400);
            });
        </script>
    @endpush
@endsection
