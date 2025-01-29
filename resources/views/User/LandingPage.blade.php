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
            <h2 class="text-center ff-poppins fs-56">
                Search for your ideal home away from home in the heart of London
            </h2>
        </div>
    </div>

    <div class="row mb-5" id="book-apartment">
        <div class="col-10 col-sm-10 mx-auto rounded bg-white">
            <form action="{{ route('Get.Available.Apartment') }}" method="get" id="form-elements" class="form mt-3 mb-3">
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
            <h4 class="mb-0">Houses</h4>
            <p>
                If you need the extra space, book an entire place for your team or family.
            </p>
        </div>

        <div class="col-md-4">
            <img src="{{ asset('assets/images/Apartment.jpg') }}" alt="House" class="img-fluid rounded">
            <h4 class="mb-0">Apartments</h4>
            <p>
                Stay in some of the most iconic locations in London in shared buildings.
            </p>
        </div>

        <div class="col-md-4">
            <img src="{{ asset('assets/images/Room.jpg') }}" alt="House" class="img-fluid rounded">
            <h4 class="mb-0">Rooms</h4>
            <p>
                Enjoy your own studio space with a common room to socialise with the rest of the team.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-capitalize ff-poppins fs-40 mt-5">Top Rated:</h2>
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
                        <div class="col-md-3 swiper-slide">
                            <a href="{{ route('Detail.View.Apartment', ['id' => $record->id]) }}" target="_blank">
                                <img src="{{ asset('Apartment/Thubmbnail/' . $record->featuredImage) }}"
                                    alt="{{ $record->street_address }}" class="img-fluid object-fit-cover">
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-text ff-poppins text-uppercase">{{ $record->area_name }}</h6>
                                    <p class="mb-0 ff-poppins">{{ $record->street_address }}</p>
                                </div>
                                <div>
                                    <p class="mb-0 ff-poppins">from £{{ $record->price }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mt-0 ff-poppins"><i class="fa-solid fa-bed"></i> {{ $record->total_bedrooms }}
                                    bedrooms</p>
                                <p class="mt-0 ff-poppins"><i class="fa-solid fa-bath"></i> {{ $record->total_bathrooms }}
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

    <div class="row mt-3">
        <h2 class="text-capitalize ff-poppins fs-40 mt-5">Neighbourhoods:</h2>
    </div>

    <div class="row">
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

    </div>

    <div class="row text-center mt-5">
        <div class="col-md-12">
            <h2 class="text-capitalize ff-poppins fs-40 mt-5">Benefits</h2>
        </div>
    </div>

    <div class="row d-flex justify-content-around mt-5">
        @foreach ($benefitsRecords as $record)
            <div class="col-md-3 benefit-card rounded {{ $record->id % 2 == 0 ? 'bg-dark' : 'bg-light' }} shadow p-4">
                <img src="{{ asset('Amenity/' . $record->amenity_icon) }}" alt="{{ $record->amenity_text }}"
                    class="img-fluid" style="height: 50px; width: 50px; border-radius: 50%;">
                <hr style="width: 20%; border:1px solid grey;" class="mt-5">
                <h5 class="{{ $record->id % 2 == 0 ? 'text-light' : 'text-dark' }} ff-poppins">
                    {{ $record->amenity_text }}
                </h5>
                <p class="{{ $record->id % 2 == 0 ? 'text-light' : 'text-dark' }} ff-poppins">
                    {{ $record->amenity_description }}</p>
            </div>
        @endforeach
    </div>

    <div class="row mt-5 d-flex justify-content-around align-items-center">
        <div class="col-md-5">
            <p class="text-dark">About Us</p>
            <h5>Central London Location</h5>
            <p>
                Central London is the innermost part of London, in England, spanning the City of London and several
                boroughs. Over time, a number of definitions have been used to define the scope of Central London for
                statistics, urban planning and local government. Its characteristics are understood to include a
                high-density built environment, high land values, an elevated daytime population and a concentration of
                regionally, nationally and internationally significant organisations and facilities.
            </p>
            <a href="https://maps.app.goo.gl/Ua2iYu6okFvQyTax8" target="_blank" class="brand-btn d-inline">Learn More</a>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/about_us_img.png') }}"
                alt="A cozy and well-lit living space with a wooden chair, coffee table, indoor plants, bookshelves, and a modern TV setup"
                class="img-fluid">
        </div>
    </div>

@endsection
