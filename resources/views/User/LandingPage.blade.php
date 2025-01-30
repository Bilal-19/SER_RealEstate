@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/home_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <h2 class="text-center fs-56 fs-sm-40">
                Find your perfect stay
            </h2>
        </div>
    </div>

    <div class="row mb-5" id="book-apartment">
        <div class="col-10 col-sm-10 mx-auto rounded bg-silver text-white">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3"
                autocomplete="off">
                @csrf
                <div class="row d-flex justify-content-around align-items-end">
                    <div class="col-md-4 mb-sm-10">
                        <label class="form-label fw-bold mb-0">Search By Area:</label>
                        <input type="text" placeholder="SEARCH BY AREA" class="form-control" name="location"
                            value="{{ old('location') }}">
                    </div>
                    <div class="col-md-2 mb-sm-10">
                        <label class="form-label fw-bold mb-0">Check In:</label>
                        <input type="date" placeholder="CHECK IN" required class="form-control" name="checkInDate"
                            value="{{ old('checkInDate') }}">
                    </div>
                    <div class="col-md-2 mb-sm-10">
                        <label class="form-label fw-bold mb-0">Check Out:</label>
                        <input type="date" placeholder="CHECK OUT" required class="form-control" name="checkOutDate"
                            value="{{ old('checkOutDate') }}">
                    </div>
                    <div class="col-md-2 mt-sm-3 mt-0">
                        <button class="btn btn-dark" type="submit">SEARCH</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-4">
            <img src="{{ asset('assets/images/House.jpg') }}" alt="House" class="img-fluid rounded">
            <h4 class="mb-0 mt-5">Houses <i class="fa-solid fa-chevron-right" style="color: #333333;"></i></h4>
            <p>
                If you need the extra space, book an entire place for your team or family.
            </p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('assets/images/Apartment.jpg') }}" alt="House" class="img-fluid rounded">
            <h4 class="mb-0 mt-5">Apartments <i class="fa-solid fa-chevron-right" style="color: #333333;"></i></h4>
            <p>
                Stay in some of the most iconic locations in London in shared buildings.
            </p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('assets/images/Room.jpg') }}" alt="House" class="img-fluid rounded">
            <h4 class="mb-0 mt-5">Rooms <i class="fa-solid fa-chevron-right" style="color: #333333;"></i></h4>
            <p>
                Enjoy your own studio space with a common room to socialise with the rest of the team.
            </p>
        </div>
    </div>

    @isset($topRatedApartment)
        <div class="row">
            <div class="col-md-12 text-center top-rated-apartment">
                <h3 class="fw-bold">Book your stay at {{ $topRatedApartment->area_name }}</h3>
                <p>{{ Str::limit($topRatedApartment->description, 200, '...') }}</p>
                <img src="{{ asset('Apartment/Thubmbnail/' . $topRatedApartment->featuredImage) }}" alt=""
                    class="img-fluid">
            </div>
        </div>
    @endisset


    <div class="row mt-5 d-flex justify-content-around">
        <div class="col-md-5">
            <p>
                We have the privilege of being entrusted by the teams of some of London's largest organisations. Our
                clientele includes top banks, esteemed law firms, and leading technology companies.
            </p>
            <p>
                We provide fully equipped properties ranging from studio apartments to large family homes and everything in
                between. Putting the needs of our guests and clients first is at the forefront of everything we do.
            </p>
            <a href="{{ route('View.Corporate') }}" target="_blank" class="brand-btn d-inline">Learn More</a>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/bed.png') }}"
                alt="A cozy and well-lit living space with a wooden chair, coffee table, indoor plants, bookshelves, and a modern TV setup"
                class="img-fluid rounded">
        </div>
    </div>

    <div class="row feedback-bg mt-5 mb-5 p-5 text-center text-white">
        <div class="col-md-11 mx-auto rounded">
            <div id="feedback" class="carousel slide">
                <div class="carousel-inner">
                    <h5>Your go to service since 2025</h5>
                    <div class="col-5 carousel-item active mt-5">
                        <h5>Feedback 01</h5>
                        <p class="col-8 col-md-10 mx-auto">“Thank you very much for excellent care throughout my stay,
                            really very much appreciated and
                            extremely helpful in making my first couple of weeks in London easier and comfortable.”</p>
                        <p class="mb-0">Zain</p>
                        <p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </p>
                    </div>

                    <div class="carousel-item mt-5">
                        <h5>Feedback 02</h5>
                        <p class="col-8 col-md-10 mx-auto">“Thank you very much for excellent care throughout my stay,
                            really very much appreciated and
                            extremely helpful in making my first couple of weeks in London easier and comfortable.”</p>
                        <p class="mb-0">Bilal</p>
                        <p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </p>
                    </div>

                    <div class="carousel-item mt-5">
                        <h5>Feedback 03</h5>
                        <p class="col-8 col-md-10 mx-auto">“Thank you very much for excellent care throughout my stay,
                            really very much appreciated and
                            extremely helpful in making my first couple of weeks in London easier and comfortable.”</p>
                        <p class="mb-0">Zain</p>
                        <p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </p>
                    </div>

                </div>
                <button class="carousel-control-prev mr-5" type="button" data-bs-target="#feedback"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#feedback" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12  text-center">
            <h3>The Sterling Experience</h3>
            <p>
                Sit back & relax, we've got everything covered. Here's why Portland should be your 1st choice when selecting
                a serviced apartment.
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{ asset('assets/images/check-mark.png') }}" alt="" class="img-fluid mb-3">
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
            <img src="{{ asset('assets/images/sofa.png') }}" alt="" class="img-fluid mb-3">
            <h5>Feel At Home</h5>
            <p>
                You will have everything you need to feel right at home
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{ asset('assets/images/protecting_people.png') }}" alt="" class="img-fluid mb-3">
            <h5>Feel Secure</h5>
            <p>
                We provide safe, secure accommodation with 24-hour support
            </p>
        </div>
    </div>
@endsection
