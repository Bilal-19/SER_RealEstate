@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/about_banner.jpg');
            background-size: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container banner-img">
            <h2 class="text-center  fs-48">
                About Sterling
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <p>
                Welcome to Sterling Executive, your premier destination for unparalleled corporate accommodation solutions.
                At Sterling Executive, we understand the diverse needs of business travellers, and we are committed to
                providing a seamless and sophisticated experience. Our platform offers an extensive portfolio of
                high-quality, professionally-managed properties, tailored to suit the corporate traveller's lifestyle. With
                a focus on comfort, convenience, and connectivity, Sterling Executive ensures that your stay is as
                productive and pleasant as possible. Our dedicated support team is always on hand to assist, ensuring that
                every aspect of your travel is taken care of with precision and expertise.
            </p>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-12  text-center">
            <h3>The Sterling Experience</h3>
            <p>
                Sit back & relax, we've got everything covered. Here's why Portland should be your 1st choice when
                selecting
                a serviced apartment.
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{ asset('assets/images/check-mark.jpg') }}" alt="" class="img-fluid mb-3">
            <h5>Simple Booking</h5>
            <p>
                Our bespoke corporate client packages come with a designated account manager to tend to all requests
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{ asset('assets/images/heart.png') }}" alt="" class="img-fluid mb-3">
            <h5>We Look After You</h5>
            <p>
                We will always be there to support you through the entirety of the booking process
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{ asset('assets/images/sofa.jpg') }}" alt="" class="img-fluid mb-3">
            <h5>Feel At Home</h5>
            <p>
                You will have everything you need to feel right at home
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{ asset('assets/images/protecting_people.jpg') }}" alt="" class="img-fluid mb-3">
            <h5>Feel Secure</h5>
            <p>
                We provide safe, secure accommodation with 24-hour support
            </p>
        </div>
    </div>
@endsection
