@extends('UserLayout.main')

@push('style')
    <style>
        .form-control, .form-select {
            background-color: #c0c0c0 !important;
            color: white !important;
        }

        .form-control::placeholder{
            color: white;
        }

        button {
            border: none;
        }

        body{
            color: #303030;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="row d-flex justify-content-evenly align-items-center mt-5 mb-5">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/dedicated-account-team.png') }}" alt="Dedicated account team"
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
            <img src="{{ asset('assets/images/kitchen.png') }}" alt="Kitchen" class="img-fluid rounded">
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

    <div class="row mt-5 mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h3>Looking for a corporate stay?</h3>

            <form action="{{ route('Create.Inquiry') }}" method="post" autocomplete="off">
                @csrf
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                        <small class="text-danger">
                            @error('fullname')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                        <small class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                        <small class="text-danger">
                            @error('company_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                        <small class="text-danger">
                            @error('phone_number')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <select name="duration_of_stay" class="form-select">
                            <option value="">Duration of Stay</option>
                            @for ($i = 1; $i <= 12; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <small class="text-danger">
                            @error('duration_of_stay')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <textarea name="enquiry" class="form-control" placeholder="Enquiry" rows="5"></textarea>
                        <small class="text-danger">
                            @error('enquiry')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-3 mx-auto">
                        <button class="brand-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
