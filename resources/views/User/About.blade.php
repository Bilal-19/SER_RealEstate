@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/about_banner.png');
            background-size: cover;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">About Us</p>
            <h2 class="text-center ff-poppins fs-48">
                Service Corporate Apartments
            </h2>
        </div>
    </div>

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

@section('user-main-section')
    <div class="row d-flex justify-content-around align-items-center mt-5">
        <div class="col-md-5">
            <p class="text-capitalize fw-medium ff-poppins fs-36">Brand Story</p>
            <p class="ff-poppins">Sterling Executive Residential is a high quality serviced apartment operator in London,
                delivering a fresh
                serviced apartment stay experiences in the city. Whether it's practical corporate housing or
                relocation, executive class business traveller, or a small group for a business project, Citadel
                Apartments is the right solution. Whether it's short or medium term stay, customers will appreciate
                the additional space, privacy, comfort and freedom of our serviced apartments at prices they'll
                appreciate.
                <br><br>
                Sterling Executive Residential is a safe way to rent a private apartment with the flexibility to avoid a
                tenancy
                agreement and only stay for the desired length.
                <br><br>
            </p>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('assets/images/about_pg_img1.jpg') }}" alt="" class="img-fluid rounded">
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center mt-5">
        <div class="col-md-5">
            <img src="{{ asset('assets/images/about_pg_img2.jpg') }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <p class="ff-poppins">
                Sterling Executive Residential is relatively new to the corporate apartment sector having only begun its
                operations in 2015.
                <br>
                <b>
                    The brand is rapidly expanding with a compound annual growth rate (CAGR) of
                    145% forecasted for the next year.
                </b>
                Sterling Executive Residential rents its own properties as opposed to many
                other online travel agencies that list apartments from third parties on their sites.
                <br> <br>
                Most of our properties are in the three to four-star category with luxury properties coming soon. The
                apartments
                are available with one or two bedrooms across Camden, Hackney, Islington, City of London, and
                Tower Hamlets.
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-2 mx-auto text-center">
            <img src="{{ asset('assets/images/quote_comma.png') }}" alt="" class="img-fluid">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-7 mx-auto">
            <p class="ff-playfair-display text-center fs-23 fst-italic opacity-90">
                "Customer service is at the heart of everything we do, as a company and as individuals. In fact, it is
                the most important aspect of our operations. It is truly our promise to deliver."
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 mx-auto">
            <hr style="background-color:#c0c0c0">
        </div>
    </div>


    <div class="row bg-eerie-black text-light">
        <div class="col-md-10 mx-auto">
            <!-- Section: Timeline -->
            <section class="py-5">
                <ul class="timeline">
                    <li class="timeline-item mb-5 d-flex flex-sm-column flex-md-row justify-content-between">
                        <div class="col-md-5">
                            <h5 class="fw-bold ff-poppins">Our Mission</h5>
                            <p class="ff-poppins">We exist to provide our customers with a wide range of high-quality serviced
                                apartments
                                across the capital London.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/mission.png') }}" alt="" class="img-fluid rounded">
                        </div>
                    </li>


                    <li class="timeline-item mb-5 d-flex flex-sm-column flex-md-row justify-content-between">
                        <div class="col-md-5">
                            <h5 class="fw-bold ff-poppins">Our Vision</h5>
                            <p class="ff-poppins">
                                Our long-term vision is to revolutionise the service apartments sector to make it accessible
                                and
                                affordable to both residents as well as business travellers.
                                <br>
                                Our short-term vision (3-5 years) is to become the No.1 choice in the corporate serviced
                                apartments
                                sector.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/vision.png') }}" alt="" class="img-fluid rounded">
                        </div>
                    </li>

                    <li class="timeline-item mb-5 d-flex flex-sm-column flex-md-row justify-content-between">
                        <div class="col-md-5">
                            <h5 class="fw-bold ff-poppins">Our Values</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="fw-medium ff-poppins fs-17">
                                        <span class="border-top-light-grey">Excellence:</span>
                                    </p>
                                    <p class="fw-normal ff-poppins fs-15">We push ourselves to constantly look for ways to
                                        improve our operations.</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-poppins fs-17">
                                        <span class="border-top-light-grey">Customer-focus:</span>
                                    </p>
                                    <p class="fw-normal ff-poppins fs-15">
                                        Customers always come first.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-poppins fs-17">
                                        <span class="border-top-light-grey">People:</span>
                                    </p>
                                    <p class="fw-normal ff-poppins fs-15">
                                        We invest in our greatest asset.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-poppins fs-17">
                                        <span class="border-top-light-grey">Passion:</span>
                                    </p>
                                    <p class="fw-normal ff-poppins fs-15">
                                        We love what we do!
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-poppins fs-17">
                                        <span class="border-top-light-grey w-50">Honesty:</span>
                                    </p>
                                    <p class="fw-normal ff-poppins fs-15">
                                        We mean what we say, we say what we mean.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/values.png') }}" alt="" class="img-fluid rounded">
                        </div>
                    </li>
                </ul>
            </section>
            <!-- Section: Timeline -->
        </div>
    </div>

    <div class="row bg-light-gray pt-5">
        <div class="col-md-12 text-center">
            <p class="text-dark ff-poppins">Insights & Tips</p>
            <h4 class="ff-poppins">Stay Connected with Sterling Executive Residential</h4>
            <p class="ff-poppins">
                Stay updated with the latest news, tips, and insights from Citadel Apartments to enhance your London
                experience.
            </p>
        </div>
    </div>

    <div class="row bg-light-gray d-flex justify-content-around pb-5">
        @foreach ($blogRecords as $record)
            <div class="col-md-4 blog-card">
                <img src="{{ asset('Blog/' . $record->thumbnail_image) }}" alt="" class="img-fluid rounded">
                <p class="ff-poppins">{{ date('d M Y', strtotime($record->publish_date)) }}</p>
                <h5 class="ff-poppins fs-18">{{ $record->blog_headline }}</h5>
                <a href="{{route('Read.Blog', ['id' => $record->id])}}" class="text-dark">Read More</a>
            </div>
        @endforeach
    </div>


    {{-- Neighborhood Section --}}


    {{-- Blog Section --}}
@endsection
