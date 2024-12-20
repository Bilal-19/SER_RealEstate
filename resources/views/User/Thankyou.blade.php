@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/thankyou.png');
            background-size: cover;
        }

        .style-container {
            height: 488px;
            width: 713px;
            background-color: #ffffff;
            border-radius: 16px;
        }

        .style-container>img {
            height: 115px;
            width: 115px;
            display: block;
            margin: auto;
        }
    </style>
@endpush

@push('CTA')
    <div class="row shadow">
        <div class="col-md-8 mx-auto style-container">
            <img src="{{ asset('assets/images/circle.jpg') }}" alt="" class="img-fluid mt-4">
            <h4 class="ff-poppins fs-40 text-center mt-3">Thank You</h4>
            <p class="ff-inter fs-18 text-center">We sent you a conformation email and <br> we will contact you shortly </p>
        </div>
    </div>
@endpush
@section('user-main-section')
@endsection
