@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-2">
            <h3 class="text-center text-uppercase">View All Cities</h3>
        </div>

        <div class="row d-flex justify-content-around">
            @foreach ($AllCities as $city)
                <div class="col-md-4 mb-5">
                    <img src="{{ asset('City/' . $city->city_image) }}" alt="" class="img-fluid shadow rounded">
                    <p class="mb-0"><i class="fa-solid fa-location-dot"></i> {{ $city->city_name }},
                        {{ $city->country_name }}</p>

                    <a href="" class="text-decoration-none text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" class="text-decoration-none text-danger mx-2"><i class="fa-solid fa-trash"></i></a>

                </div>
            @endforeach

        </div>
    </div>
@endsection
