@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/benefit_banner.png');
            background-size: cover;
        }
    </style>
@endpush

@push('footer-cta')
    <div class="container-fluid footer footer-bottom-border" id="footer_bg">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <h4 class="ff-poppins text-light">Why rent a hotel when you enjoy an apartment?</h4>
                <p class="ff-poppins text-light">Feel like home at one of our modern apartments located in the heart of
                    London.
                    Make your own meals, order a
                    take-away, enjoy the space and privacy, just like home.</p>
            </div>
            <div class="col-md-3">
                <a href="#book-apartment" class="footer-search-btn">Search</a>
            </div>
        </div>
    </div>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto text-light search-container">
            <p class="text-center ff-poppins">BENEFITS</p>
            <h2 class="text-center ff-poppins fs-48">
                Corporate Housing Solutions in London
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-5 pt-2 pb-2 d-flex justify-content-evenly align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/teamwork_benefit_pg.png') }}" alt="A group of diverse professionals collaborating around a laptop, showcasing teamwork and engagement in a modern workspace." class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <h4 class="text-capitalize pt-2 ff-poppins fs-36 fw-medium">Why Service Apartments?</h4>
            <p class="ff-poppins">
                Fully serviced apartments offer a home away from home for the reserved business traveller. <b>Sterling
                    Executive Residential</b> deliver this luxury from start to finish. Online bookings ensure the lowest
                price point
                for
                our guests. Find a better rate and we will beat it by ten percent. Flexible contracts are available for
                the long term corporate apartment stay with a two week notice policy after ninety days. Sterling Executive
                Residential
                guest relations staff are available 24/7 to ensure peace of mind. Enjoy your space in London and
                avoid living in the crowded hotels.
            </p>

            <b class="ff-poppins">Book online or contact us for more information.</b>
            <p class="ff-poppins">Group rates are available.</p>
        </div>
    </div>


    <div class="row d-flex justify-content-evenly align-items-center mt-5">
        <div class="col-md-6">
            <h4 class="ff-poppins fs-36">Benefits</h4>
            <ul class="benefits-point">
                <li>At least three times the space of an average hotel room</li>
                <li>Personalised service with welcoming staff in our onsite receptions</li>
                <li>Housekeeping</li>
                <li>A home away from home atmosphere</li>
                <li>Dine in or dine out - the choice is yours</li>
                <li>Free wi-fi</li>
                <li>Flat-screen TV</li>
                <li>Find a better rate elsewhere and we will beat it by 10%</li>
                <li>Excellent customer service</li>
                <li>No hidden costs or penalties</li>
                <li>A wider selection of packages, deals and offers available</li>
                <li>Accessibility to London city centre locations</li>
            </ul>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/benefit_point_img.jpg') }}" alt="A young man in a casual blue t-shirt working on a laptop outdoors, reflecting productivity and focus in a serene environment" class="img-fluid rounded">
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-11 mx-auto bg-light-gray rounded">
            <div class="row d-flex justify-content-around mt-5 mb-5">
                <div class="col-md-5 bg-white rounded">
                    <p class="fw-medium fs-24 pt-3 ff-poppins">Amenities</p>
                    <ul class="amenities-points">
                        <hr>
                        @foreach ($amenities as $val)
                            <li><img src="{{ asset('Amenity/' . $val->amenity_icon) }}" alt="{{ $val->amenity_text }}">
                                <span class="mx-1 ff-poppins">{{ $val->amenity_text }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-5 bg-white rounded">
                    <p class="fw-bold text-uppercase pt-3">Policy</p>
                    <ul class="policy-points">
                        <hr>
                        @foreach ($policies as $val)
                            <li>
                                <img src="{{ asset('Policy/Icons/' . $val->policy_icon) }}" alt="{{ $val->policy_name }}">
                                <span class="mx-1 ff-poppins">{{ $val->policy_name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Reviews Slider --}}
@endsection
