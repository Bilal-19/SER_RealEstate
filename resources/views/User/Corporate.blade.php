@extends('UserLayout.main')
@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/corporate.png');
            background-size: cover;
        }

        .benefit-card-odd,
        .benefit-card-even {
            height: 365px;
            width: 283px;
            color: white;
            border-radius: 8px;
            padding: 32px 22px;
        }

        .benefit-card-odd {
            background-color: #B1895A;
        }

        .benefit-card-even {
            background-color: #3A3A3A;
        }

        hr {
            width: 35px;
            border-top: 3px solid white;
        }

        .booking-card {
            width: 300px;
            height: 228px;
            padding: 24px;
            border-radius: 15px;
            background-color: #FFFFFF;
            border: 1px solid rgb(185, 185, 185);
        }
    </style>
@endpush


@push('CTA')
    <div class="row mt-5">
        <div class="col-md-6 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Corporate</p>
            <h2 class="text-center ff-poppins fs-48">
                Corporate Housing Solutions in London
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
@push('footer-cta')
    <div class="container-fluid footer footer-bottom-border" id="footer_bg">
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
@section('user-main-section')
    <div class="row d-flex justify-content-around align-items-center mt-5">
        <div class="col-md-5">
            <h4 class="fs-36 ff-inter fw-medium">Corporate Housing Solutions in London</h4>
            <p class="ff-inter mt-4">
                At Sterling Executive Residential, we understand that relocating employees or accommodating business
                travelers
                requires more than just a comfortable stay—it demands a seamless experience. Our fully serviced
                apartments are tailored to meet the needs of companies and their employees, offering a perfect blend of
                convenience, flexibility, and comfort.
            </p>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/team.png') }}" alt="" class="img-fluid">
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center mt-5 mb-5">
        <div class="col-md-5">
            <img src="{{ asset('assets/images/DiscussionTeam.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-5">
            <h4 class="ff-inter fs-36">Tailored Relocation Services</h4>
            <p class="ff-inter">Relocating employees to a new city or country can be daunting, but with Citadel
                Apartments, the process becomes stress-free.</p>

            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ asset('assets/images/Icons/support.png') }}">
                </div>
                <div class="mx-3">
                    <h6 class="fs-18 ff-inter">Orientation Support</h6>
                    <p class="ff-inter">Provide your employees with resources to settle into London comfortably.</p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ asset('assets/images/Icons/support.png') }}">
                </div>
                <div class="mx-3">
                    <h6 class="fs-18 ff-inter">
                        Customizable Packages
                    </h6>
                    <p class="ff-inter">
                        Choose from a variety of accommodation options to suit your budget and needs.
                    </p>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <img src="{{ asset('assets/images/Icons/support.png') }}">
                </div>
                <div class="mx-3">
                    <h6 class="fs-18 ff-inter">
                        Dedicated Assistance:
                    </h6>
                    <p class="ff-inter">
                        Our team works closely with your company to handle all aspects of corporate relocation.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @php
        $fetchBenefits = DB::table('amenity')->limit(4)->get();
    @endphp
    <div class="row bg-eerie-black pb-5 pt-5">
        <div class="col-md-12 text-center">
            <p class="text-light-brown ff-poppins">Benefits</p>
            <h6 class="ff-poppins fs-36 text-light">More Space, More Comfort</h6>
            <p class="ff-inter fs-18 text-center text-light">
                Enjoy spacious, fully furnished apartments—at least three times the size of a typical hotel room.
            </p>
        </div>

        @foreach ($fetchBenefits as $rec)
            @if ($rec->id % 2 == 0)
                <div class="col-md-2 benefit-card-odd mx-4">
                    <img src="{{ asset('Benefits/' . $rec->benefit_icon) }}" alt="" class="img-fluid">
                    <hr>
                    <p class="ff-poppins fs-22 fw-medium mt-4">{{ $rec->benefit_text }}</p>
                    <p class="ff-inter">
                        {{ $rec->benefit_description }}
                    </p>
                </div>
            @else
                <div class="col-md-2 benefit-card-even mx-4 ">
                    <img src="{{ asset('Benefits/' . $rec->benefit_icon) }}" alt="">
                    <hr>
                    <p class="ff-poppins fs-22 fw-medium mt-4">{{ $rec->benefit_text }}</p>
                    <p class="ff-inter">
                        {{ $rec->benefit_description }}
                    </p>
                </div>
            @endif
        @endforeach
    </div>


    <div class="row d-flex justify-content-around align-items-center pt-5 pb-5">
        <div class="col-md-5">
            <img src="{{ asset('assets/images/amenitiesFrame.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-5">
            <h4 class="ff-inter fs-36">Business Amenities</h4>
            <p class="ff-inter mt-3">
                We provide special amenities for business travelers, such as complimentary printing, copy and fax machines,
                larger work desk, a safe…etc upon request. Please contact one of our team members to discuss your
                requirements.
            </p>
        </div>
    </div>

    <div class="row bg-light-gray pb-5">
        <div class="col-md-10 pt-5 pb-5 mx-auto">
            <h4 class="ff-inter fs-36 text-center">Simplified Booking Process</h4>
            <p class="ff-inter text-center">We make corporate housing simple and straightforward:</p>
        </div>

        <div class="col-md-11 mx-auto">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-4 booking-card mx-3">
                    <img src="{{ asset('assets/images/Icons/one.png') }}" alt="" class="img-fluid">
                    <h6 class="ff-inter fs-18 mt-3">Browse Apartments</h6>
                    <p class="ff-inter">Browse our available apartments online.</p>
                </div>

                <div class="col-md-4 booking-card mx-3">
                    <img src="{{ asset('assets/images/Icons/two.png') }}" alt="" class="img-fluid">
                    <h6 class="ff-inter fs-18 mt-3">Book via Website</h6>
                    <p class="ff-inter">Book directly through our platform or contact our guest relations team for personalized assistance.</p>
                </div>

                <div class="col-md-4 booking-card mx-3">
                    <img src="{{ asset('assets/images/Icons/three.png') }}" alt="" class="img-fluid">
                    <h6 class="ff-inter fs-18 mt-3">Enjoy</h6>
                    <p class="ff-inter">Enjoy competitive rates with our price-match guarantee—find a better rate elsewhere, and we'll beat it by 10%.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h4 class="fs-40 ff-poppins">Neighbourhood</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            @isset($fetchNeighboursData)
            @if (count($fetchNeighboursData) > 4)
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($fetchNeighboursData as $rec)
                        <div class="col-md-3 swiper-slide">
                            <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt=""
                                class="img-fluid neighbourhood-img rounded shadow">
                            <p class="fs-5 text-uppercase mb-0">{{ $rec->area_name }}</p>
                            <p class="mt-0">
                                {!! Str::limit($rec->description, 50) !!}
                            </p>
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-slider-button swiper-button-prev"></div>
                <div class="swiper-slider-button swiper-button-next"></div>

                <!-- If we need scrollbar -->
            </div>
        @else
            <p>Please add minimum five records to view the nearest apartments</p>
        @endif
            @endisset
        </div>
    </div>
    {{-- Display the Neighborhood data --}}
@endsection
