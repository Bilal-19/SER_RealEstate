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
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3" autocomplete="off">
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
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="text-capitalize  fs-40 mt-5">Top Rated:</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($favApartmentRecords as $record)
                        <div class="col-md-4 swiper-slide ">
                            <a href="{{ route('Detail.View.Apartment', ['id' => $record->id]) }}" target="_blank">
                                <img src="{{ asset('Apartment/Thubmbnail/' . $record->featuredImage) }}"
                                    alt="{{ $record->street_address }}" class="img-fluid object-fit-cover">
                            </a>
                            <h5>Apartment Type</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-text  text-uppercase">{{ $record->area_name }}</h6>
                                    <p class="mb-0 ">{{ $record->street_address }}</p>
                                </div>
                                <div>
                                    <p class="mb-0 ">from £{{ $record->price }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mt-0 "><i class="fa-solid fa-bed"></i> {{ $record->total_bedrooms }}
                                    bedrooms</p>
                                <p class="mt-0 "><i class="fa-solid fa-bath"></i> {{ $record->total_bathrooms }}
                                    bathrooms</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <button class="swiper-slider-button swiper-button-prev"></button>
                <div class="swiper-slider-button swiper-button-next"></div>
            </div>
            <!-- If we need scrollbar -->
        </div>
    </div>

    {{-- <div class="row mt-3">
        <h2 class="text-capitalize  fs-40 mt-5">Neighbourhoods:</h2>
    </div> --}}

    {{-- <div class="row">
        <div class="col-md-11 mx-auto">
            @isset($fetchNearestApartment)
                @if (count($fetchNearestApartment) > 4)
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($fetchNearestApartment as $rec)
                                <div class="col-md-3 swiper-slide">
                                    <a href="{{ route('Detail.View.Apartment', ['id' => $rec->id]) }}" target="_blank">
                                        <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}"
                                            alt="{{ $rec->street_address }}"
                                            class="img-fluid neighbourhood-img rounded shadow">
                                    </a>
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

    </div> --}}

    {{-- <div class="row text-center mt-5">
        <div class="col-md-12">
            <h2 class="text-capitalize  fs-40 mt-5">Benefits</h2>
        </div>
    </div> --}}

    {{-- <div class="row d-flex justify-content-around mt-5">
        @foreach ($benefitsRecords as $record)
            <div class="col-md-3 benefit-card rounded {{ $record->id % 2 == 0 ? 'bg-dark' : 'bg-light' }} shadow p-4">
                <img src="{{ asset('Amenity/' . $record->amenity_icon) }}" alt="{{ $record->amenity_text }}"
                    class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%;">
                <hr style="width: 20%; border:1px solid grey;" class="mt-5">
                <h5 class="{{ $record->id % 2 == 0 ? 'text-light' : 'text-dark' }} ">
                    {{ $record->amenity_text }}
                </h5>
                <p class="{{ $record->id % 2 == 0 ? 'text-light' : 'text-dark' }} ">
                    {{ $record->amenity_description }}</p>
            </div>
        @endforeach
    </div> --}}

    <div class="row">
        <div class="col-md-12 text-center top-rated-apartment">
            <h3 class="fw-bold">Book your stay at {{ $topRatedApartment->area_name }}</h3>
            <p>{{ Str::limit($topRatedApartment->description, 200, '...') }}</p>
            <img src="{{ asset('Apartment/Thubmbnail/' . $topRatedApartment->featuredImage) }}" alt=""
                class="img-fluid">
        </div>
    </div>

    <div class="row mt-5 d-flex justify-content-around">
        <div class="col-md-5">
            <p>
                We have the privilege of being entrusted by the teams of some of London's largest organisations. Our
                clientele includes top banks, esteemed law firms, and leading technology companies.
                We provide fully equipped properties ranging from studio apartments to large family homes and everything in
                between. Putting the needs of our guests and clients first is at the forefront of everything we do.
            </p>
            <a href="{{ route('View.Corporate') }}" target="_blank" class="brand-btn d-inline">Learn More</a>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/Apartment.jpg') }}"
                alt="A cozy and well-lit living space with a wooden chair, coffee table, indoor plants, bookshelves, and a modern TV setup"
                class="img-fluid rounded">
        </div>
    </div>

    <div class="row feedback-bg mt-5 mb-5 p-5 text-center text-white">
        <div class="col-md-12">
            <div id="feedback" class="carousel slide">
                <div class="carousel-inner">
                    <h5>Your go to service since 2025</h5>
                    <div class="carousel-item active">
                        <h5>Feedback 01</h5>
                        <p>“Thank you very much for excellent care throughout my stay, really very much appreciated and
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

                    <div class="carousel-item">
                        <h5>Feedback 02</h5>
                        <p>“Thank you very much for excellent care throughout my stay, really very much appreciated and
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

                    <div class="carousel-item">
                        <h5>Feedback 03</h5>
                        <p>“Thank you very much for excellent care throughout my stay, really very much appreciated and
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
                <button class="carousel-control-prev" type="button" data-bs-target="#feedback" data-bs-slide="prev">
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
                Sit back & relax, we've got everything covered. Here's why Portland should be your 1st choice when selecting a serviced apartment.
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{asset("assets/images/check-mark.png")}}" alt="" class="img-fluid mb-3">
            <h5>Simple Booking</h5>
            <p>
                Our bespoke corporate client packages come with a designated account manager to tend to all requests
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{asset("assets/images/heart.png")}}" alt="" class="img-fluid mb-3">
            <h5>We Look After You</h5>
            <p>
                We will always be there to support you through the entirety of the booking process
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{asset("assets/images/sofa.png")}}" alt="" class="img-fluid mb-3">
            <h5>Feel At Home</h5>
            <p>
                You will have everything you need to feel right at home
            </p>
        </div>

        <div class="col-md-3 text-center ">
            <img src="{{asset("assets/images/protecting_people.png")}}" alt="" class="img-fluid mb-3">
            <h5>Feel Secure</h5>
            <p>
                We provide safe, secure accommodation with 24-hour support
            </p>
        </div>
    </div>
@endsection
