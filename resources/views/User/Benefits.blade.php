@extends('UserLayout.main')
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
    <div class="row mt-5 bg-body-tertiary pt-2 pb-2 d-flex justify-content-around align-items-center">
        <div class="col-md-5">
            <img src="{{ asset('assets/images/teamwork_benefit_pg.webp') }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <h4 class="text-capitalize bg-light pt-2 pb-2 px-4 rouned">Why Serviced Appartments?</h4>
            <p>
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

            <b>Book online or contact us for more information.</b>
            <p>Group rates are available.</p>
        </div>
    </div>


    <div class="row d-flex justify-content-around align-items-center">
        <div class="col-md-5">
            <p class="text-uppercase fw-bold">Benefits</p>
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

    <div class="row d-flex justify-content-around mt-5 mb-5 bg-light-gray pt-5 pb-5">
        <div class="col-md-5 bg-white rounded">
            <p class="fw-bold text-uppercase pt-3">Amenities</p>
            <ul class="amenities-points">
                <hr>
                @foreach ($amenities as $val)
                    <li><img src="{{ asset('Benefits/' . $val->benefit_icon) }}" alt=""> {{ $val->benefit_text }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-5 bg-white rounded">
            <p class="fw-bold text-uppercase pt-3">Policy</p>
            <ul class="policy-points">
                <hr>
                <li>🛏️ Minimum three-night stay</li>
                <li>🚫🐾 No pets</li>
                <li>🚭 No smoking</li>
                <li>📆 Fourteen days cancellation policy</li>
                <li>🤝 Preferred rate negotiation for long term stays</li>
                <li>💵 Lower rates on VAT for stays over 29 days</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <p class="text-center fw-bold">
                Sterling Executive Residential are spacious with a superb value for the money as rates are up to 30% less
                than a comparable hotel room and offer a giant increase in space. Our booking transactions are secure and
                trusted. Hear what people have to say:
            </p>
        </div>
    </div>

    {{-- Reviews Slider --}}
@endsection
