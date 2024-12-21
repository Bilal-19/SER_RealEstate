@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/home_banner.png');
            background-size: cover;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Your Home Away from Home with Citadel Apartments</p>
            <h2 class="text-center ff-poppins fs-56">Experience Comfort and Flexibility in the Heart of London
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

@section('user-main-section')
    <div class="row">
        <div class="col-md-12">
            <p class="text-capitalize ff-poppins fs-40 mt-5">Favourites:</p>

        </div>
    </div>



    {{--  --}}
    <div class="row">
        <div class="col-md-11 mx-auto">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($favApartmentRecords as $record)
                        <div class="col-md-3 swiper-slide">
                            <img src="{{ asset('Apartment/Favourites/' . $record->featured_image) }}" alt=""
                                class="img-fluid object-fit-cover">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-text ff-inter text-uppercase">{{ $record->apartment_name }}</h6>
                                    <p class="mb-0 ff-inter">{{ $record->apartment_location }}</p>
                                </div>
                                <div>
                                    <p class="mb-0 ff-inter">from £{{ $record->apartment_price }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mt-0 ff-inter"><i class="fa-solid fa-bed"></i> {{ $record->totalBedrooms }}
                                    bedrooms</p>
                                <p class="mt-0 ff-inter"><i class="fa-solid fa-bath"></i> {{ $record->totalBathrooms }}
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


    <div class="row mt-5 d-flex justify-content-center align-items-center bg-light-gray">
        <div class="col-md-6 p-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9933.259719847401!2d-0.13748113914276847!3d51.507438004617406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604ce37bbdb95%3A0x5120415568fd2d8b!2sCentral%20London%2C%20London%20WC2N%205DU%2C%20UK!5e0!3m2!1sen!2s!4v1732259214866!5m2!1sen!2s"
                width="100%" height="450" style="border:0; filter: invert(90%);" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
        </div>

        <div class="col-md-4">
            <h3 class="ff-inter">Central London Location</h3>
            <p class="ff-inter">
                Central London is the innermost part of London, in England, spanning the City of London and several
                boroughs. Over time, a number of definitions have been used to define the scope of Central London for
                statistics, urban planning and local government. Its characteristics are understood to include a
                high-density built environment, high land values, an elevated daytime population and a concentration of
                regionally, nationally and internationally significant organisations and facilities.
            </p>
            <a href="" class="brand-btn">Explore Now</a>
        </div>
    </div>

    <div class="row mt-3">
        <p class="text-capitalize ff-poppins fs-40 mt-5">Neighbourhoods:</p>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            @if (count($fetchNearestApartment) > 4)
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($fetchNearestApartment as $rec)
                        <div class="col-md-3 swiper-slide">
                            <img src="{{ asset('Apartment/Thubmbnail/'.$rec->featuredImage) }}" alt=""
                                class="img-fluid neighbourhood-img rounded shadow">
                            <p class="fs-5 text-uppercase mb-0">{{$rec->area_name}}</p>
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

        </div>
    </div>

    <div class="row text-center mt-5">
        <div class="col-md-12">
            <p class="text-light-brown">Benefits</p>
        </div>

        <div class="col-md-6 mx-auto">
            <button class="brand-btn">Book Now</button>
            <button class="brand-btn-invert">View All Benefits</button>
        </div>
    </div>

    <div class="row d-flex justify-content-around mt-5">
        @foreach ($benefitsRecords as $record)
            <div class="col-md-3 benefit-card rounded {{ $record->id % 2 == 0 ? 'bg-dark' : 'bg-light' }} shadow p-4">
                <img src="{{ asset('Benefits/' . $record->benefit_icon) }}" alt="" class="img-fluid"
                    style="height: 50px; width: 50px; border-radius: 50%;">
                <hr style="width: 20%; border:1px solid grey;" class="mt-5">
                <h5 class="{{ $record->id % 2 == 0 ? 'text-light' : 'text-dark' }} ff-poppins">
                    {{ $record->benefit_text }}
                </h5>
                <p class="{{ $record->id % 2 == 0 ? 'text-light' : 'text-dark' }} ff-inter">
                    {{ $record->benefit_description }}</p>
            </div>
        @endforeach
    </div>

    <div class="row mt-5 d-flex justify-content-around align-items-center">
        <div class="col-md-5">
            <p class="text-light-brown">About Us</p>
            <h5>Central London Location</h5>
            <p>
                Central London is the innermost part of London, in England, spanning the City of London and several
                boroughs. Over time, a number of definitions have been used to define the scope of Central London for
                statistics, urban planning and local government. Its characteristics are understood to include a
                high-density built environment, high land values, an elevated daytime population and a concentration of
                regionally, nationally and internationally significant organisations and facilities.
            </p>
            <a href="" class="brand-btn d-inline">Learn More</a>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/about_us_img.png') }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row mt-3 bg-light-gray pt-5">
        <div class="col-md-12 text-center">
            <h4 class="ff-inter">Resources to Get Some Information</h4>
            <p class="ff-inter">Discover premium apartments tailored to your lifestyle, with unbeatable locations and
                amenities.</p>
        </div>
    </div>

    <div class="row bg-light-gray d-flex justify-content-around pb-5">
        @foreach ($blogRecords as $record)
            <div class="col-md-4 blog-card">
                <img src="{{ asset('Blog/' . $record->thumbnail_image) }}" alt="" class="img-fluid rounded">
                <p class="ff-inter">{{ date('d M Y', strtotime($record->publish_date)) }}</p>
                <h5 class="ff-inter fs-18">{{ $record->blog_headline }}</h5>
                <p class="ff-inter fs-18">{{ $record->blog_brief_description }}</p>
                <a href="#" class="text-light-brown">Read More</a>
            </div>
        @endforeach
    </div>
@endsection
