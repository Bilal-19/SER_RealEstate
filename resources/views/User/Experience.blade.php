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

    <div class="row">
        <div class="col-md-11 mx-auto">
            <h3>Booking FAQs</h3>
        </div>
    </div>
@endsection
