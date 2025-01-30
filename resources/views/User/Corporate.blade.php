@extends('UserLayout.main')

@push('style')
    <style>
        .form-control {
            background-color: #c0c0c0 !important;
            color: white !important;
        }

        button {
            border: none;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="row d-flex justify-content-evenly align-items-center mt-5 mb-5">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/dedicated-account-team.jpg') }}" alt="Dedicated account team"
                class="img-fluid rounded">
        </div>
        <div class="col-md-4">
            <h3>Your Dedicated Account Team</h3>
            <p>
                Our booking process and rates are transparent and easy to understand, created to meet different budgets
                based on the location, features and amenities that our clients want.

                Your dedicated Account Management Team and our on-boarding process ensure we are fully briefed on all your
                needs, making repeat bookings super easy.
            </p>
        </div>
    </div>


    <div class="row d-flex justify-content-evenly align-items-center mt-5 mb-5">
        <div class="col-md-4">
            <h3>Everything you Need</h3>
            <p>
                We work to simplify the customer journey, yet take the time to get to know our guests as we understand no
                two are the same. We listen and don't shy away from the human touches that make your team feel supported and
                cared for.

                Our varied portfolio allows us to accommodate all the needs of your team, ensuring their stay is tailored to
                them.
            </p>
            <a href="" class="brand-btn">Learn More</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/kitchen.jpg') }}" alt="Kitchen" class="img-fluid rounded">
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-12 text-center">
            <h3>The Sterling Standard</h3>
            <p>Working, relaxing, and living. Our apartments have everything you need to feel at home during your stay.</p>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h3>Looking for a corporate stay?</h3>

            <form action="" autocomplete="off">
                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <input type="text" name="company_name" class="form-control" placeholder="Duration of Stay">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <textarea name="enquiry" class="form-control" placeholder="Enquiry" rows="5"></textarea>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <button class="brand-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
