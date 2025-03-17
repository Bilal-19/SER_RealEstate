@extends('UserLayout.main')

@push('canonical-tag')
    <link rel="canonical" href="https://sterling-executive.com/corporate">
@endpush

@push('style')
    <style>
        .form-control,
        .form-select {
            background-color: #c0c0c0 !important;
            color: white !important;
            border-radius: 12px !important;
            /* padding: 8px 10px; */
        }

        .form-control::placeholder,
        .form-select::placeholder {
            color: white;
            font-size: 18px;
        }

        .brand-btn {
            font-weight: bold;
            border-radius: 12px;
            padding: 12px 30px;
        }

        body {
            color: #303030;
        }

        .style-corporate-text {
            letter-spacing: 0.8px;
            line-height: 1.2;
            text-align: justify;
            font-weight: 600;
        }

        .standard-card {
            height: 100px;
            width: 100px;
        }

        .standard-card img {
            display: block;
            margin: 10px auto;
        }

        .flex-container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        #account-team {
            border-radius: 12px;
        }

        @media screen and (max-width: 768px) {
            .standard-card {
                margin-top: 20px;
                height: fit-content;
                width: fit-content;
            }

            .mt-sm-150 {
                margin-top: 150px;
            }

            .flex-container {
                flex-direction: column-reverse;
            }

            #account-team {
                margin-top: 50px;
            }

            .mb-sm-15 {
                margin-bottom: 15px;
            }
        }
    </style>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-150 mt-sm-150">
        <div class="mt-5 row d-flex justify-content-evenly align-items-center">
            <div class="col-md-6 mb-sm-15">
                <img src="{{ asset('assets/images/dedicated-account-team.webp') }}" alt="Dedicated account team"
                    class="img-fluid" id="account-team">
            </div>
            <div class="col-md-4">
                <h3 class="fs-48 fs-sm-25">Your Dedicated Account Team</h3>
                <p class="style-corporate-text">
                    Our easy booking for corporate housing ensures a transparent and hassle-free process. We
                    offer competitive rates tailored to different budgets, based on location, features, and amenities.
                </p>
                <p class="style-corporate-text">
                    Your corporate housing services in London ensure we’re fully briefed on your needs, making
                    repeat bookings simple and efficient.
                </p>
            </div>
        </div>
    </div>



    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row flex-container">
            <div class="col-md-4">
                <h3 class="fs-48 fs-sm-25">Everything you Need</h3>
                <p class="style-corporate-text">
                    We work to simplify the customer journey while providing personalized service. Our corporate
                    housing services in London cater to teams of all sizes, ensuring their stay is tailored to their
                    unique requirements.
                </p>
                <p class="style-corporate-text mb-5">
                    From fully equipped properties to studio apartments in London, we
                    accommodate all needs, making your team feel supported and cared for.
                </p>
                <a href="{{ route('view.Experience') }}" class="brand-btn mb-sm-25">Learn More</a>
            </div>
            <div class="col-md-7 mt-sm-25 mb-sm-15">
                <img src="{{ asset('assets/images/kitchen.webp') }}" alt="Kitchen" class="img-fluid rounded">
            </div>
        </div>
    </div>


    <div class="container-fluid mt-150 mt-sm-75">
        <div class="row mb-5">
            <div class="col-md-10 mx-auto text-center">
                <h3 class="fs-48 fs-sm-25">The Sterling Standard</h3>
                <p>Working, relaxing, and living. Our apartments have everything you need to feel at home during your stay.
                </p>
            </div>
        </div>

        <div class="row d-flex justify-content-around align-items-center mx-auto">
            @foreach ($fetchAllStandards as $record)
                <div class="col-md col-12 text-center standard-card">
                    <img src="{{ asset('Standards/' . $record->standard_icon) }}" alt="{{ $record->standard_text }}"
                        class="img-fluid">
                    <p class="text-center fw-medium text-charcoal-black mt-3">{{ $record->standard_text }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid mt-150">
        <div class="row mt-5 mb-5">
            <div class="col-md-7 mx-auto">
                <h3 class="fs-50 fs-sm-25 text-center mb-5">Looking for a corporate stay?</h3>
            </div>

            <div class="col-md-7 mx-auto">
                <form action="{{ route('Create.CorporateInquiry') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-5 mb-sm-40">
                            <input type="text" name="fullname" class="form-control" placeholder="Full Name *">
                            <small class="text-danger">
                                @error('fullname')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="col-md-5">
                            <input type="email" name="email" class="form-control" placeholder="Email Address  *">
                            <small class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between mt-5">
                        <div class="col-md-5 mb-sm-40">
                            <input type="text" name="company_name" class="form-control" placeholder="Company Name ">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number *">
                            <small class="text-danger">
                                @error('phone_number')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <input type="text" name="duration_of_stay" class="form-control"
                                placeholder="Duration of stay *">
                            <small class="text-danger">
                                @error('duration_of_stay')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <textarea name="enquiry" class="form-control" placeholder="Enquiry *" rows="5" style="resize: none;"></textarea>
                            <small class="text-danger">
                                @error('enquiry')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                        <div class="col-md-12 mx-auto text-center">
                            <button class="brand-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
