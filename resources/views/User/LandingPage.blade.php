@extends('UserLayout.main')


@section('user-main-section')
    <div class="row">
        <div class="col-md-12">
            <p class="text-capitalize ff-poppins fs-40 mt-5">Favourites:</p>
            <!-- If we need navigation buttons -->
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
                            <img src="{{ asset('Apartment/Favourites/'.$record->featured_image) }}" alt=""
                                class="img-fluid object-fit-cover">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-text ff-inter text-uppercase">{{$record->apartment_name}}</h6>
                                    <p class="mb-0 ff-inter">{{$record->apartment_location}}</p>
                                </div>
                                <div>
                                    <p class="mb-0 ff-inter">from £{{$record->apartment_price}}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mt-0 ff-inter"><i class="fa-solid fa-bed"></i> {{$record->totalBedrooms}} bedrooms</p>
                                <p class="mt-0 ff-inter"><i class="fa-solid fa-bath"></i> {{$record->totalBathrooms}} bathrooms</p>
                            </div>
                        </div>
                    @endforeach
                </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-slider-button swiper-button-prev"></div>
  <div class="swiper-slider-button swiper-button-next"></div>
            </div>


            <!-- If we need scrollbar -->
        </div>
    </div>


    <div class="row mt-5 bg-light d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9933.259719847401!2d-0.13748113914276847!3d51.507438004617406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604ce37bbdb95%3A0x5120415568fd2d8b!2sCentral%20London%2C%20London%20WC2N%205DU%2C%20UK!5e0!3m2!1sen!2s!4v1732259214866!5m2!1sen!2s"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        <p class="fs-3">THE NEIGHBOURHOODS:</p>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/regents_park.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Regent's Park</p>
                        <p class="mt-0">Luxurious green spaces footsteps from Oxford Street</p>
                    </div>

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/shoreditch.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Shoreditch</p>
                        <p class="mt-0">Hipster central and full of edge</p>
                    </div>

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/barbican.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Barbican</p>
                        <p class="mt-0">Home to the Barbican Center of Performing Arts</p>
                    </div>

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/farringdon.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Farringdon</p>
                        <p class="mt-0">Footsteps away from the City of London</p>
                    </div>

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/regents_park.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Regent's Park</p>
                        <p class="mt-0">Luxurious green spaces footsteps from Oxford Street</p>
                    </div>

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/regents_park.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Regent's Park</p>
                        <p class="mt-0">Luxurious green spaces footsteps from Oxford Street</p>
                    </div>

                    <div class="col-md-3 swiper-slide">
                        <img src="{{ asset('assets/images/regents_park.webp') }}" alt=""
                            class="img-fluid neighbourhood-img rounded shadow">
                        <p class="fs-5 text-uppercase mb-0">Regent's Park</p>
                        <p class="mt-0">Luxurious green spaces footsteps from Oxford Street</p>
                    </div>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-slider-button swiper-button-prev"></div>
                <div class="swiper-slider-button swiper-button-next"></div>

                <!-- If we need scrollbar -->
            </div>
        </div>
    </div>

    <div class="row">
        <p class="text-light-brown">Benefits</p>
    </div>
    <div class="row mt-3">
        <p class="fs-3">THE BLOG:</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/blog_img_1.webp') }}" alt="" class="img-fluid blog-img">
            <p class="text-uppercase fs-5">Borough Market Party for the Bastille</p>
            <p class="col-md-11">A whole day of events - and then some... From wine testing to a food fair and
                small theatrical shows.
                The balloons were still there in the late evenings as well as the drinking crowd. The live music
                played loud and dancing carried on late.</p>
        </div>


        <div class="col-md-6">
            <img src="{{ asset('assets/images/blog_img_2.webp') }}" alt="" class="img-fluid blog-img">
            <p class="text-uppercase fs-5">Spitalfields Market: Grand Day for Shopping</p>
            <p class="col-md-11">
                Ever not wanted to have another boring day? Just add a little optimism, some ingenuity and there you
                have it - no longer stuck at home. Spitalfield's Market has lots of little pop up shops selling
                everything from used vinyl to hand crafted jewellery and vintage clothes.
            </p>
        </div>
    </div>
@endsection
