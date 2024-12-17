@extends('UserLayout.main')
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

@section('user-main-section')
    <div class="row d-flex justify-content-around align-items-center mt-5">
        <div class="col-md-5">
            <p class="text-capitalize fw-medium ff-inter fs-36">Brand Story</p>
            <p class="ff-inter">Sterling Executive Residential is a high quality serviced apartment operator in London,
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
            <p class="ff-inter">
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
            <hr style="background-color:#b1895a">
        </div>
    </div>


    <div class="row bg-eerie-black text-light">
        <div class="col-md-10 mx-auto">
            <!-- Section: Timeline -->
            <section class="py-5">
                <ul class="timeline">
                    <li class="timeline-item mb-5 d-flex flex-sm-column flex-md-row justify-content-between">
                        <div class="col-md-5">
                            <h5 class="fw-bold ff-inter">Our Mission</h5>
                            <p class="ff-inter">We exist to provide our customers with a wide range of high-quality serviced
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
                            <h5 class="fw-bold ff-inter">Our Vision</h5>
                            <p class="ff-inter">
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
                            <h5 class="fw-bold ff-inter">Our Values</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="fw-medium ff-inter fs-17">
                                        <span class="border-top-light-brown">Excellence:</span>
                                    </p>
                                    <p class="fw-normal ff-inter fs-15">We push ourselves to constantly look for ways to
                                        improve our operations.</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-inter fs-17">
                                        <span class="border-top-light-brown">Customer-focus:</span>
                                    </p>
                                    <p class="fw-normal ff-inter fs-15">
                                        Customers always come first.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-inter fs-17">
                                        <span class="border-top-light-brown">People:</span>
                                    </p>
                                    <p class="fw-normal ff-inter fs-15">
                                        We invest in our greatest asset.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-inter fs-17">
                                        <span class="border-top-light-brown">Passion:</span>
                                    </p>
                                    <p class="fw-normal ff-inter fs-15">
                                        We love what we do!
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fw-medium ff-inter fs-17">
                                        <span class="border-top-light-brown w-50">Honesty:</span>
                                    </p>
                                    <p class="fw-normal ff-inter fs-15">
                                        We mean what we say, we say what we mean.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/values.png') }}" alt="" class="img-fluid rounded">
                        </div>
                    </li>

                    {{-- <li class="timeline-item mb-5">
                        <h5 class="fw-bold">Earned the first million $!</h5>
                        <p class="text-muted mb-2 fw-bold">15 October 2020</p>
                        <p class="text-muted">
                            Nulla ac tellus convallis, pulvinar nulla ac, fermentum diam. Sed
                            et urna sit amet massa dapibus tristique non finibus ligula. Nam
                            pharetra libero nibh, id feugiat tortor rhoncus vitae. Ut suscipit
                            vulputate mattis.
                        </p>
                    </li> --}}
                </ul>
            </section>
            <!-- Section: Timeline -->
        </div>
    </div>

    <div class="row bg-light-gray pt-5">
        <div class="col-md-12 text-center">
            <p class="text-light-brown ff-poppins">Insights & Tips</p>
            <h4 class="ff-inter">Stay Connected with Sterling Executive Residential</h4>
            <p class="ff-inter">
                Stay updated with the latest news, tips, and insights from Citadel Apartments to enhance your London
                experience.
            </p>
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


    {{-- Neighborhood Section --}}


    {{-- Blog Section --}}
@endsection
