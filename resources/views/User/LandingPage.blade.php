@extends('UserLayout.main')

@push('style')
    <style>
        .home-bg-img {
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.25) 0 100%), url('/assets/images/home_banner.webp');
            background-size: cover;
            background-attachment: scroll;
            background-repeat: no-repeat;
            height: 800px;
            border-radius: 15px;
            width: 97%;
            margin: 25px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-control {
            background-color: #c0c0c0;
            border: none;
            width: 50%;
        }

        .form-control::placeholder {
            color: #ffffff;
            font-family: "Montserrat", serif;
            text-align: center;
            font-weight: lighter;
            font-size: 18px;
        }

        .form-control:focus {
            color: #303030;
        }

        #explore-cta-apartment {
            position: relative;
            right: -1050px;
            top: -90px;
            color: white;
            background-color: #c0c0c0;
            padding: 18px 24px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 20px;
        }

        #book-apartment-searchbar .form-control {
            border-right: 2px solid #ddd;
        }

        #book-apartment-searchbar .form-control:last-of-type {
            border-right: none;
        }

        .input-group {
            border: 1px solid #c0c0c0;
            height: fit-content;
            width: fit-content;
            border-radius: 12px !important;
        }

        .top-rated-apartment {
            font-weight: 500;
        }

        .bedroom-img {
            height: 660px;
            width: 660px;
            object-fit: cover;
            border-radius: 12px;
        }

        .learn-more-btn {
            color: #ffffff;
            background-color: #c0c0c0;
            padding: 8px 25px;
            font-weight: bold;
            border-radius: 6px;
            font-size: 20px;
        }

        .apartment-category-img {
            height: 420px;
            width: 420px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 35px;
        }

        .search-btn {
            background-color: #c0c0c0;
            border: none;
            padding: 10px 12px;
            border-radius: 6px;
        }


        .top-rated-apartment>img {
            width: 1200px;
            border-radius: 10px;
            display: block;
            margin: 10px auto;
        }

        @media screen and (max-width: 768px) {
            #explore-cta-apartment {
                right: -160px;
                top: -60px;
            }

            .form-control::placeholder {
                font-size: 14px;
            }

            .home-bg-img {
                height: 300px;
            }

            .bedroom-img {
                height: 350px;
                width: 350px;
                object-fit: cover;
                margin: 10px auto;
            }

            .apartment-category-img {
                margin-bottom: 10px;
                margin-top: 20px;
            }
        }
    </style>
@endpush

@push('CTA')
    <div class="container-fluid home-bg-img mb-3 mt-150 mt-sm-200">
        <div class="row">
            <div class="col-md-12 mx-auto text-light search-container">
                <h2 class="text-center fs-56 fs-sm-28">
                    Find your perfect stay
                </h2>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-9 col-12 mx-auto" id="book-apartment">
                <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3"
                    autocomplete="off">
                    @csrf
                    <div id="book-apartment-searchbar" class="input-group">
                        <input type="text" placeholder="Location" class="form-control" name="location"
                            value="{{ old('location') }}">
                        <input type="text" placeholder="Arrival" required class="form-control" name="checkInDate"
                            value="{{ old('checkInDate') }}" onfocus="(this.type='date')">
                        <input type="text" placeholder="Departure" required class="form-control" name="checkOutDate"
                            value="{{ old('checkOutDate') }}" onfocus="(this.type='date')">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"
                                style="color:white;"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-4 col-11">
                <img src="{{ asset('assets/images/House.webp') }}" alt="House" class="img-fluid apartment-category-img">
                <a href="{{ route('Property.Houses') }}" class="text-dark">
                    <h4>Houses <i class="fa-solid fa-chevron-right" style="color: #333333;"></i></h4>
                </a>
                <p class="col-md-11">
                    If you need the extra space, book an entire place for your team or family.
                </p>
            </div>
            <div class="col-md-4 col-11">
                <img src="{{ asset('assets/images/Apartment.webp') }}" alt="Apartments"
                    class="img-fluid apartment-category-img">
                <a href="{{ route('Property.Apartments') }}" class="text-dark">
                    <h4>Apartments <i class="fa-solid fa-chevron-right" style="color: #333333;"></i></h4>
                </a>
                <p class="col-md-11">
                    Stay in some of the most iconic locations in London in shared buildings.
                </p>
            </div>
            <div class="col-md-4 col-11">
                <img src="{{ asset('assets/images/Room.webp') }}" alt="Rooms" class="img-fluid apartment-category-img">
                <a href="{{ route('Property.Rooms') }}" class="text-dark">
                    <h4>Rooms <i class="fa-solid fa-chevron-right" style="color: #333333;"></i></h4>
                </a>
                <p class="col-md-11">
                    Enjoy your own studio space with a common room to socialise with the rest of the team.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-150 mt-sm-75">
        @isset($topRatedApartment)
            <div class="row mt-5 mb-5">
                <div class="col-md-12 mx-auto top-rated-apartment">
                    <h2 class="fw-bold fs-48 fs-sm-25 col-md-10">Book your stay at {{ $topRatedApartment->apartment_name }}
                    </h2>
                    <p class="col-md-9 fs-18 fs-sm-16">{{ Str::limit($topRatedApartment->description, 200, '...') }}</p>
                    <img src="{{ asset('Apartment/Thubmbnail/' . $topRatedApartment->featured_image) }}" alt="{{ $topRatedApartment->apartment_name }}"
                        class="img-fluid mt-3">
                    <a href="{{ route('Detail.View.Apartment', ['id' => $topRatedApartment->id]) }}"
                        id="explore-cta-apartment">Explore</a>
                </div>
            </div>
        @endisset
    </div>


    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row">
            <div class="col-md-6">
                <p class="fs-26">
                    We have the privilege of being entrusted by the teams of some of London's largest organisations. Our
                    clientele includes top banks, esteemed law firms, and leading technology companies.
                </p>
                <p class="fs-15">
                    We provide fully equipped properties ranging from studio apartments to large family homes and everything
                    in
                    between. Putting the needs of our guests and clients first is at the forefront of everything we do.
                </p>
                <a href="{{ route('View.Corporate') }}" target="_blank" class="learn-more-btn">Learn more</a>
            </div>
            <div class="col-md-6 mt-sm-25">
                <img src="{{ asset('assets/images/bed.webp') }}"
                    alt="A cozy and well-lit living space with a wooden chair, coffee table, indoor plants, bookshelves, and a modern TV setup"
                    class="img-fluid bedroom-img">
            </div>
        </div>

    </div>

    @isset($fetchAllTestimonials)
        <div class="container-fluid mt-150 mt-sm-75">
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
                        <div class="carousel-inner" data-bs-ride="carousel" data-bs-interval="3000">
                            <h5 class="text-start">Your go to service since 2025</h5>

                            @foreach ($fetchAllTestimonials as $record)
                                <div class="col-5 carousel-item text-start mt-5 {{ $record->id == 1 ? 'active' : '' }}">
                                    <h5 class="col-12 col-md-12 fw-bold">“{{ $record->message }}”</h5>
                                    <p class="mt-5 mb-2">{{ $record->name }}</p>
                                    <p class="mb-5">{!! calcStars($record->rating, 5 - $record->rating) !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset



    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="fs-48 fs-sm-25">The Sterling Experience</h3>
                <p>
                    Sit back & relax, we've got everything covered. Here's why Sterling Executive should be your first
                    choice when selecting a serviced apartment.
                </p>
            </div>
        </div>

        <div class="row mt-70">
            <div class="col-md-3 col-10 mx-auto text-center">
                <img src="{{ asset('assets/images/check-mark.webp') }}" alt="Simple Booking" class="img-fluid mb-3">
                <h5>Simple Booking</h5>
                <p class="mt-5 mb-sm-0">
                    Our bespoke corporate client packages come with a designated account manager to tend to all requests
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
                <img src="{{ asset('assets/images/protecting_people.webp') }}" alt="Provide security" class="img-fluid mb-3">
                <h5>Feel Secure</h5>
                <p class="mt-5 mb-sm-0">
                    We provide safe, secure accommodation with 24-hour support
                </p>
            </div>
        </div>
    </div>

@endsection
