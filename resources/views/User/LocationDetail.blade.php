@extends('UserLayout.main')

@push('style')
    <style>
        #map {
            height: 100%;
            width: 100%;
            border: 1px solid black;
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
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <p>Showing {{ count($filterApartments) }} results</p>
                    </div>
                    <div class="col-md-5">
                        <button>Show Filters</button>
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
        var map = L.map('map').setView([25.276987, 55.296249], 10);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Dummy marker data
        var locations = [
            { name: 'Location A', latitude: 25.276987, longitude: 55.296249 },
            { name: 'Location B', latitude: 24.774265, longitude: 46.738586 }
        ];

        console.log(locations); // Check the data in the browser console

        // Loop through markers and add them to the map
        locations.forEach(function(location) {
            L.marker([location.latitude, location.longitude]).addTo(map)
                .bindPopup(location.name);
        });
    </script>
    @endpush

@endsection
