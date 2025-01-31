@extends('UserLayout.main')


@section('user-main-section')
    <div class="row d-flex justify-content-around align-items-center mt-5 mb-5">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/sterling-experience.png') }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-md-5">
            <h3>The Sterling Experience</h3>
            <p>
                We understand when staying in one of our apartments, you're often far from home, so whether it's offering
                advice on your local area, or getting a special request delivered to your apartment, our 24/7 Guest
                Relations Team is always on hand to help.
            </p>
            <p>
                Planning to stay with us? Take a look at our guest journey below to understand how our team look after you
                every step of the way.
            </p>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-10 mx-auto text-center">
            <h3>The Sterling Standard</h3>
            <p>Working, relaxing, and living. Our apartments have everything you need to feel at home during your stay.</p>
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center">
        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/all_bills.jpg")}}" alt="" class="img-fluid">
            <p>All Bills Included</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/wifi.jpg")}}" alt="" class="img-fluid">
            <p>Wi-Fi</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/hair-dryer.jpg")}}" alt="" class="img-fluid">
            <p>Hairdryer</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/iron.jpg")}}" alt="" class="img-fluid">
            <p>Iron & Ironing Board</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/house-keeping.jpg")}}" alt="" class="img-fluid">
            <p>Housekeeping</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/smart-tv.jpg")}}" alt="" class="img-fluid">
            <p>Smart TV</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/kitchen-facility.jpg")}}" alt="" class="img-fluid">
            <p>Kitchen Facilities</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/laundary.jpg")}}" alt="" class="img-fluid">
            <p>Laundry Facilities</p>
        </div>

        <div class="col-md-1 text-center">
            <img src="{{asset("assets/images/fresh-towel.jpg")}}" alt="" class="img-fluid">
            <p>Fresh Linens</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            <h3>Booking FAQs</h3>
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
@endsection
