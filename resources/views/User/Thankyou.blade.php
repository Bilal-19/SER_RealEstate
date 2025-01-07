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

        .icon {
            height: 46px;
            width: 46px;
        }
    </style>
@endpush

@push('CTA')
    <div class="row shadow">
        <div class="col-md-8 mx-auto style-container">
            <img src="{{ asset('assets/images/circle.jpg') }}" alt="" class="img-fluid mt-5">
            <h4 class="ff-poppins fs-40 text-center mt-4">Thank You</h4>
            <p class="ff-poppins fs-18 text-center">We sent you a conformation email and <br> we will contact you shortly </p>

            <div class="d-flex justify-content-around align-items-center mt-5 bg-pale-gray p-16">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('assets/images/Icons/whatsapp.png') }}" alt="" class="img-fluid icon">
                    </div>
                    <div class="mx-2">
                        <p class="mb-0 ff-poppins fw-semibold">Phone</p>
                        <p class="mb-0 ff-poppins fs-18">+44 7921919426</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('assets/images/Icons/email.png') }}" alt="" class="img-fluid icon">
                    </div>
                    <div class="mx-2">
                        <p class="mb-0 ff-poppins fw-semibold">Email</p>
                        <p class="mb-0 ff-poppins fs-18">zain.rav@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
@section('user-main-section')
@endsection
