@extends('UserLayout.main')
@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Available Apartments</p>
            <h2 class="text-center ff-poppins fs-56">Experience Comfort and Flexibility in the Heart of London
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

@section('user-main-section')
    <div class="row">
        <p>
            {{ count($availableApartments) }} records found
        </p>
    </div>
    <div class="row mx-auto  mt-3 mb-3">
        @foreach ($availableApartments as $rec)
            <div class="col-md-10 mx-auto">
                <div class="row bg-white rounded d-flex flex-row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt=""
                            class="img-fluid mt-2 mb-2 rounded">
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="ff-inter fs-24">{{ $rec->area_name }}</h5>
                                <p class="ff-inter">{{ $rec->street_address }}</p>
                            </div>
                            <div>
                                <p class="ff-inter">from ${{ $rec->price }}</p>
                            </div>
                        </div>
                        <p class="ff-inter">{{ $rec->description }}</p>
                        <div class="d-flex flex-row justify-content-start">
                            <p class="d-inline ff-inter">
                                <img src="{{asset('assets/images/bedroom.png')}}" alt="">
                                {{$rec->total_bedrooms}} Bedrooms
                            </p>
                            <p class="d-inline ff-inter mx-3">
                                <img src="{{asset('assets/images/Bathroom.png')}}" alt="">
                                {{$rec->total_bathrooms}} Bathrooms
                            </p>
                        </div>
                        <a href="{{route('Detail.View.Apartment', ['id' => $rec->id])}}" class="btn btn-dark ff-inter">View Apartment</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
