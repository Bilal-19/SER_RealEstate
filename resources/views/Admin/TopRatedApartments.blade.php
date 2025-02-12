@extends('AdminLayout.DashboardTemplate')
<style>
    .thumbnail{
        height: 300px;
        width: 300px;
        object-fit: cover;
    }
</style>
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Top Rated Apartments</h3>
        </div>

        <div class="row ">
            @foreach ($fetchFavApartment as $rec)
                <div class="col-md-4">
                    <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featured_image) }}" alt="" class="img-fluid thumbnail rounded">
                    <p class="mt-2 mb-0">
                        <i class="fa-solid fa-location-dot"></i>
                        {{$rec->apartment_name}}
                    </p>
                </div>
            @endforeach
        </div>


    </div>
@endsection
