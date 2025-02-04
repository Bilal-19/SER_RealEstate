@extends('UserLayout.main')

@push('style')
@endpush

@section('user-main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Corporate Stays in {{ $locationName }}</h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-4">
                        <p>Showing {{ count($filterApartments) }} results</p>
                    </div>
                    <div class="col-md-4">
                        <button>Show Filters</button>
                    </div>
                </div>

                <div class="row">
                    @foreach ($filterApartments as $record)
                        <div class="col-md-6">
                            <img src="{{ asset('Apartment/Thubmbnail/'.$record->featured_image) }}" alt=""
                                class="img-fluid rounded">
                                <p class="mb-0">{{$record->street_address}}</p>
                                <p>From €{{$record->one_bedroom_price}} per night</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
@endsection
