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
    <div class="container-fluid footer" id="footer_bg">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <h4 class="ff-inter text-light">Why rent a hotel when you enjoy an apartment?</h4>
                <p class="ff-inter text-light">Feel like home at one of our modern apartments located in the heart of
                    London.
                    Make your own meals, order a
                    take-away, enjoy the space and privacy, just like home.</p>
            </div>
            <div class="col-md-3">
                <a href="" class="footer-search-btn">Search</a>
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
    <div class="row mb-5">
        <div class="col-md-9 mx-auto rounded bg-white">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements"
                class="form mt-3 mb-3">
                @csrf
                <div class="row d-flex justify-content-around align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-bold mb-0">Search By Area:</label>
                        <input type="text" placeholder="SEARCH BY AREA" class="form-control"
                            name="location">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold mb-0">Check In:</label>
                        <input type="date" placeholder="CHECK IN" required class="form-control"
                            name="checkInDate">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold mb-0">Check Out:</label>
                        <input type="date" placeholder="CHECK OUT" required class="form-control"
                            name="checkOutDate">
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
    <div class="row mt-5 pt-2 pb-2 d-flex justify-content-evenly align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/teamwork_benefit_pg.png') }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <h4 class="text-capitalize pt-2 ff-inter fs-36 fw-medium">Why Service Apartments?</h4>
            <p class="ff-inter">
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

            <b class="ff-inter">Book online or contact us for more information.</b>
            <p class="ff-inter">Group rates are available.</p>
        </div>
    </div>


    <div class="row d-flex justify-content-evenly align-items-center mt-5">
        <div class="col-md-6">
            <h4 class="ff-inter fs-36">Benefits</h4>
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
            <img src="{{ asset('assets/images/benefit_point_img.jpg') }}" alt="" class="img-fluid rounded">
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-11 mx-auto bg-light-gray rounded">
            <div class="row d-flex justify-content-around mt-5 mb-5">
                <div class="col-md-5 bg-white rounded">
                    <p class="fw-medium fs-24 pt-3 ff-inter">Amenities</p>
                    <ul class="amenities-points">
                        <hr>
                        @foreach ($amenities as $val)
                            <li><img src="{{ asset('Benefits/' . $val->benefit_icon) }}" alt="">
                                <span class="mx-1 ff-inter">{{ $val->benefit_text }}</span>
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
                                <img src="{{ asset('Policy/Icons/' . $val->policy_icon) }}" alt="">
                                <span class="mx-1 ff-inter">{{ $val->policy_name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Reviews Slider --}}
@endsection
