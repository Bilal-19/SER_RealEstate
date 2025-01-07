@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/benefit_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto text-light search-container">
            <p class="text-center ff-poppins">BOOK NOW</p>
            <h2 class="text-center ff-poppins fs-48">
                Premium Corporate Accommodation in London
            </h2>
        </div>
    </div>

    <div class="row mb-5" id="book-apartment">
        <div class="col-md-9 mx-auto rounded bg-white">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3">
                @csrf
                <div class="row d-flex justify-content-around align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-bold mb-0">Search By Area:</label>
                        <input type="text" placeholder="SEARCH BY AREA" class="form-control" name="location" value="{{old('location')}}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold mb-0">Check In:</label>
                        <input type="date" placeholder="CHECK IN" required class="form-control" name="checkInDate" value="{{old("checkInDate")}}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold mb-0">Check Out:</label>
                        <input type="date" placeholder="CHECK OUT" required class="form-control" name="checkOutDate" value="{{old("checkOutDate")}}">
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

@endsection
