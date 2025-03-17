@extends('UserLayout.main')

@push('canonical-tag')
    <link rel="canonical" href="https://sterling-executive.com/about">
@endpush

@push('style')
    <style>
        .about-bg {
            background-image: linear-gradient(to right, rgba(0,0,0, 0.25) 0 100%), url('/assets/images/about_banner.webp');
            background-size: cover;
            background-attachment: scroll;
            background-repeat: no-repeat;
            background-position: center;
            height: 850px;
            border-radius: 12px;
            margin: 50px auto;
            width: 92%;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .about-text {
            text-align: justify;
            font-weight: 500;
        }

        .mt-100{
            margin-top:100px;
        }

        @media screen and (max-width: 768px) {
            .about-bg {
                height: 350px;
                width: 350px;
                object-fit: cover;
            }

            .mt-sm-300{
                margin-top: 180px;
            }
        }
    </style>
@endpush

@push('CTA')
    <div class="container-fluid about-bg mt-150 mt-sm-200">
        <div class="row text-center">
            <div class="col-md-12 text-light">
                <h2 class="fs-48 fs-sm-28">
                    About Sterling
                </h2>
            </div>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-50 mt-sm-25">
        <div class="row">
            <div class="mx-auto col-md-11">
                <p class="about-text">
                    Welcome to Sterling Executive, your premier destination for unparalleled corporate accommodation
                    solutions.
                    At Sterling Executive, we understand the diverse needs of business travellers, and we are committed to
                    providing a seamless and sophisticated experience. Our platform offers an extensive portfolio of
                    high-quality, professionally-managed properties, tailored to suit the corporate traveller's lifestyle.
                    With
                    a focus on comfort, convenience, and connectivity, Sterling Executive ensures that your stay is as
                    productive and pleasant as possible. Our dedicated support team is always on hand to assist, ensuring
                    that
                    every aspect of your travel is taken care of with precision and expertise.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-100 mt-sm-75">
        <div class="row">
            <div class="col-md-11 text-center mx-auto">
                <h3 class="fs-48 fs-sm-25">The Sterling Experience</h3>
                <p>
                    Sit back & relax, we've got everything covered. Here's why Sterling Executive should be your first
                    choice when selecting a serviced apartment.
                </p>
            </div>
        </div>

        <div class="row mt-70">
            <div class="col-md-11 mx-auto">
                <div class="row">
                    <div class="col-md-3 col-10 mx-auto text-center">
                        <img src="{{ asset('assets/images/check-mark.webp') }}" alt="Simple Booking" class="img-fluid mb-3">
                        <h5>Simple Booking</h5>
                        <p class="mt-5 mb-sm-0">
                            Our bespoke corporate client packages come with a designated account manager to tend to all
                            requests
                        </p>
                    </div>

                    <div class="col-md-3 col-10 mx-auto text-center">
                        <img src="{{ asset('assets/images/heart.webp') }}" alt="Supporting Tenants" class="img-fluid mb-3">
                        <h5>We Look After You</h5>
                        <p class="mt-5 mb-sm-0">
                            We will always be there to support you through the entirety of the booking process
                        </p>
                    </div>

                    <div class="col-md-3 col-10 mx-auto text-center">
                        <img src="{{ asset('assets/images/sofa.webp') }}" alt="Feel Comfortable" class="img-fluid mb-3">
                        <h5>Feel At Home</h5>
                        <p class="mt-5 mb-sm-0">
                            You will have everything you need to feel right at home
                        </p>
                    </div>

                    <div class="col-md-3 col-10 mx-auto text-center">
                        <img src="{{ asset('assets/images/protecting_people.webp') }}" alt="Providing security" class="img-fluid mb-3">
                        <h5>Feel Secure</h5>
                        <p class="mt-5 mb-sm-0">
                            We provide safe, secure accommodation with 24-hour support
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
