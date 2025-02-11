@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/benefit_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }

        .form-control {
            background-color: #c0c0c0;
            border: none;
            width: 50%;
        }

        .form-control::placeholder {
            color: white;
            font-size: 20px;
        }

        @media screen and (max-width: 768px) {
            .form-control::placeholder {
                font-size: 14px;
            }

            .mt-sm-150{
                margin-top: 150px;
            }
        }
    </style>
@endpush

@push('CTA')
    <div class="container-fluid mt-150 mt-sm-150">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto search-container">
                <p class="text-center">BOOK NOW</p>
                <h2 class="text-center fs-48 fs-sm-25">
                    Premium Corporate Accommodation in London
                </h2>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-5 col-12 mx-auto" id="book-apartment">
                <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3"
                    autocomplete="off">
                    @csrf
                    <div id="book-apartment-searchbar" class="input-group">
                        <input type="text" placeholder="Location" class="form-control" name="location"
                            value="{{ old('location') }}">
                        <input type="text" placeholder="Arrival" required class="form-control" name="checkInDate"
                            value="{{ old('checkInDate') }}" onfocus="(this.type='date')">
                        <input type="text" placeholder="Departure" required class="form-control" name="checkOutDate"
                            value="{{ old('checkOutDate') }}" onfocus="(this.type='date')">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"
                                style="color:white;"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@section('user-main-section')
@endsection
