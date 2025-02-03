@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/home_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }

        .cta-landing-pg-img{
            height: 800px !important;
            width: 800px
        }

        #book-apartment{
            background-color: #c0c0c0;
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

    <div class="row mb-5">
        <div class="col-10 col-sm-10 mx-auto rounded" id="book-apartment">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3"
                autocomplete="off">
                @csrf
                <div class="row d-flex justify-content-center align-items-end">
                    <div class="col-md-4 mb-sm-10">
                        <input type="text" placeholder="Location" class="form-control" name="location"
                            value="{{ old('location') }}">
                    </div>
                    <div class="col-md-2 mb-sm-10">
                        <input type="text" placeholder="Arrival" required class="form-control" name="checkInDate"
                            value="{{ old('checkInDate') }}" onfocus="(this.type='date')">
                    </div>
                    <div class="col-md-2 mb-sm-10">
                        <input type="text" placeholder="Departure" required class="form-control" name="checkOutDate"
                            value="{{ old('checkOutDate') }}" onfocus="(this.type='date')">
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
            <div class="col-md-11 mx-auto text-center top-rated-apartment">
                <h3 class="fw-bold">Book your stay at {{ $topRatedApartment->apartment_name }}</h3>
                <p>{{ Str::limit($topRatedApartment->description, 200, '...') }}</p>
                <img src="{{ asset('Apartment/Thubmbnail/' . $topRatedApartment->featured_image) }}" alt=""
                    class="img-fluid cta-landing-pg-img">
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




    @isset($fetchAllTestimonials)
        @php
            function calcStars($numFill, $numBlank)
            {
                return str_repeat('<i class="fa-solid fa-star"></i>', $numFill) .
                    str_repeat('<i class="fa-regular fa-star"></i>', $numBlank);
            }
        @endphp
        <div class="row feedback-bg mt-5 mb-5 p-5 text-center text-white">
            <div class="col-md-12 rounded">
                <div id="feedback" class="carousel slide">
                    <div class="carousel-inner" data-bs-ride="carousel" data-bs-interval="10000">
                        <h5 class="text-start">Your go to service since 2025</h5>

                        @foreach ($fetchAllTestimonials as $record)
                            <div class="col-5 carousel-item text-start mt-5 {{ $record->id == 1 ? 'active' : '' }}">
                                <h5 class="col-8 col-md-12 fw-bold">“{{ $record->message }}”</h5>
                                <p class="mb-0">{!! calcStars($record->rating, 5 - $record->rating) !!}</p>
                                <p>{{ $record->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endisset



    <div class="row">
        <div class="col-md-12  text-center">
            <h3>The Sterling Experience</h3>
            <p>
                Sit back & relax, we've got everything covered. Here's why Portland should be your 1st choice when selecting
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
