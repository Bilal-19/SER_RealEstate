@extends('UserLayout.main')
@push('style')
    <style>
        body {
            background-color: #fafafa;
        }

        .banner-img {
            background-image: url('/assets/images/available_apartment_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }

        .booking-container {
            background-color: #ececec;
            border-radius: 16px;
            padding: 32px;
        }

        .booking-date {
            background-color: #ffffff;
            border-radius: 6px;
            padding: 10px;
            height: 48px;
            width: 203px;
        }

        .border-grey {
            border: 1px solid rgb(212, 212, 212);
        }

        ul>li {
            font-size: 14px;
            font-family: "inter";
        }

        .book-apartment-thumbnail {
            height: 98px;
            width: 120px;
        }

        .price-container {
            height: 390px;
            width: 441px;
            padding: 24px;
        }

        @media screen and (max-width: 768px) {
            .booking-date {
                width: 150px;
            }

            .price-container {
                margin-top: 10px;
            }
        }
    </style>
@endpush

@push('scripts')
    {{-- JavaScript --}}
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }

                });



                if (!$form.data('cc-on-file')) {

                    e.preventDefault();

                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                    Stripe.createToken({

                        number: $('.card-number').val(),

                        cvc: $('.card-cvc').val(),

                        exp_month: $('.card-expiry-month').val(),

                        exp_year: $('.card-expiry-year').val()

                    }, stripeResponseHandler);

                }



            });



            /*------------------------------------------

            --------------------------------------------

            Stripe Response Handler

            --------------------------------------------

            --------------------------------------------*/

            function stripeResponseHandler(status, response) {

                if (response.error) {

                    $('.error')

                        .removeClass('hide')

                        .find('.alert')

                        .text(response.error.message);

                } else {

                    /* token contains id, last4, and card type */

                    var token = response['id'];



                    $form.find('input[type=text]').empty();

                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                    $form.get(0).submit();

                }

            }



        });
    </script>
@endpush

@push('CTA')
    <div class="row mt-5 mb-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Apartment Name</p>
            <h2 class="text-center ff-poppins fs-48">
                Booking Page
            </h2>
        </div>
    </div>
@endpush


@section('user-main-section')
    @php
        if ($bedrooms == 1) {
            $totalCost = $findApartment->one_bedroom_price * $stayDays;
        } else {
            $totalCost = $findApartment->two_bedroom_price * $stayDays;
        }

        if ($bedrooms == 1) {
            $bedroomPrice = $findApartment->one_bedroom_price;
        } else {
            $bedroomPrice = $findApartment->two_bedroom_price;
        }

        $countries = [
            'United States',
            'India',
            'China',
            'United Arab Emirates',
            'Saudi Arabia',
            'Australia',
            'Canada',
            'Germany',
            'France',
            'Italy',
            'Spain',
            'Brazil',
            'Russia',
            'Japan',
            'South Africa',
            'Ireland',
            'Pakistan',
            'Bangladesh',
            'Nigeria',
            'Turkey',
        ];
    @endphp
    <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around">
            <div class="col-md-5 bg-white border-grey border-radius-16">
                <div class="booking-container mt-3">
                    <h4 class="ff-poppins fs-20">Booking Details</h4>
                    <div class="d-flex mt-4">
                        <div>
                            <p class="ff-poppins mb-0">Check In Date:</p>
                            <p class="booking-date">{{ date('d M Y', strtotime($checkIn)) }}</p>
                        </div>
                        <div class="mx-5">
                            <p class="ff-poppins mb-0">Check Out Date:</p>
                            <p class="booking-date">{{ date('d M Y', strtotime($checkOut)) }}</p>
                        </div>
                    </div>

                    <p class="ff-poppins mt-3">{{ $stayDays }} Night stay</p>
                </div>

                <h4 class="ff-poppins fs-24 mt-5">Personal Information</h4>


                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <form role="form"
                    action="{{ route('stripe.post', [
                        'apartmentID' => $findApartment->id,
                        'checkIn' => $checkIn,
                        'checkOut' => $checkOut,
                        'totalDays' => $stayDays,
                        'totalAmount' => $totalCost,
                        'apartment_price' => $bedroomPrice
                    ]) }}"
                    method="post" class="require-validation" data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">First Name: </label>
                            <input type="text" class="form-control ff-poppins fs-16" name="fname"
                                value="{{ old('fname') }}">
                            <small class="text-danger">
                                @error('fname')
                                    {{ 'The first name field is required' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Last Name: </label>
                            <input type="text" class="form-control ff-poppins fs-16" name="lname"
                                value="{{ old('lname') }}">
                            <small class="text-danger">
                                @error('lname')
                                    {{ 'The last name field is required' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between mt-3">
                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Email Address: </label>
                            <input type="email" class="form-control ff-poppins fs-16" name="email"
                                value="{{ old('email') }}">
                            <small class="text-danger">
                                @error('email')
                                    {{ 'The email field is required' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Phone Number: </label>
                            <input type="text" class="form-control ff-poppins fs-16" name="phone"
                                value="{{ old('phone') }}">
                            <small class="text-danger">
                                @error('phone')
                                    {{ 'The phone number field is required' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between mt-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Country: </label>
                            <select name="country" id="" class="form-select ff-poppins fs-16"
                                value="{{ old('country') }}">
                                @foreach ($countries as $val)
                                    <option value="{{ $val }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">
                                @error('country')
                                    {{ 'The country field is required' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Postal Code: </label>
                            <input type="text" class="form-control ff-poppins fs-16" name="postal_code"
                                value="{{ old('postal_code') }}">
                            <small class="text-danger">
                                @error('postal_code')
                                    {{ 'The postal code field is required' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div>
                            <label class="form-label fs-14 ff-poppins">Address: </label>
                            <input type="text" class="form-control ff-poppins fs-16" name="address"
                                value="{{ old('address') }}">
                            <small class="text-danger">
                                @error('address')
                                    {{ 'The address field is required' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Select No of Adults: </label>
                            <select name="adults" id="" class="form-select ff-poppins fs-16"
                                value="{{ old('adults') }}">
                                @for ($i = 1; $i < 4; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="text-danger">
                                @error('adults')
                                    {{ 'The adults field is required' }}
                                @enderror
                            </small>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label fs-14 ff-poppins">Select No of Childrens: </label>
                            <select name="childrens" id="" class="form-select ff-poppins fs-16"
                                value="{{ old('childrens') }}">
                                @for ($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="text-danger">
                                @error('childrens')
                                    {{ 'The childrens field is required' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <h4 class="ff-poppins fs-24 mt-5">Payment Information</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Name on Card</label>
                            <input class="form-control" type="text" name="account_title"
                                value="{{ old('account_title') }}">
                            <small class="text-danger">
                                @error('account_title')
                                    {{ 'The name on card field is required' }}
                                @enderror
                            </small>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Card Number</label>
                                <input autocomplete="off" class="form-control card-number" type="text"
                                    name="card_number" value="{{ old('card_number') }}">
                                <small class="text-danger">
                                    @error('card_number')
                                        {{ 'The card number field is required' }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>



                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label">CVC</label>
                            <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" type="text"
                                name="cvc" value="{{ old('cvc') }}">
                            <small class="text-danger">
                                @error('cvc')
                                    {{ 'The CVC field is required' }}
                                @enderror
                            </small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Expiration Month</label>
                            <input class="form-control card-expiry-month" placeholder="MM" type="text"
                                name="expMonth" value="{{ old('expMonth') }}">
                            <small class="text-danger">
                                @error('expMonth')
                                    {{ 'The expiration month field is required' }}
                                @enderror
                            </small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Expiration Year</label>
                            <input class="form-control card-expiry-year" placeholder="YYYY" type="text"
                                name="expYear" value="{{ old('expYear') }}">
                            <small class="text-danger">
                                @error('expYear')
                                    {{ 'The expiraton year field is required' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <h5 class="ff-poppins fs-20">Terms & Conditions</h5>
                    <ul>
                        <li>
                            Citadel will contact you after booking with important arrival and access information.
                        </li>
                        <li>
                            Please note that the maximum occupancy of each individual apartment varies between three to five
                            people depending on the apartment.
                        </li>
                        <li>
                            Cleaning, linen and towels are offered weekly free of charge.
                        </li>
                        <li>
                            Additional cleaning, linen and towels are available at an additional fee.
                        </li>
                        <li>
                            Please note the lead guest must be 25 years or older.
                        </li>
                        <li>
                            Late check-in and late check-out are possible (subject to availability) for an additional charge
                            upon prior confirmation by the property.
                        </li>
                        <li>
                            Late check-in between 20:00 and 21:00 is possible by prior arrangement and an additional fee of
                            GBP
                            30.
                        </li>
                        <li>
                            Late check-in between 21:00 and 23:30 is possible by prior arrangement and an additional fee of
                            GBP
                            50.
                        </li>
                        <li>
                            Guests are required to show a photo identification and credit card upon check-in.
                        </li>
                        <li>
                            Please note that all Special Requests are subject to availability and additional charges may
                            apply.
                        </li>
                        <li>
                            Please inform Citadel Apartments Aldgate in advance of your expected arrival time.
                        </li>
                        <li>
                            You can use the Special Requests box when booking, or contact the property directly with the
                            contact
                            details provided in your confirmation.
                        </li>
                        <li>
                            A damage deposit may be required on arrival. You should be reimbursed on check-out.
                        </li>
                        <li>
                            Payment before arrival via bank transfer is required. The property will contact you after you
                            book
                            to provide instructions.
                        </li>
                        <li>
                            This property will not accommodate hen, stag or similar parties.
                        </li>
                        <li>
                            Parties/Events are not allowed.
                        </li>
                        <li>
                            Pets are not allowed.
                        </li>
                        <li>
                            All children are welcome.
                        </li>
                        <li>
                            There is no capacity for extra beds.
                        </li>
                    </ul>

                    <p class="fw-medium ff-poppins mb-0">Other Request</p>
                    <textarea cols="30" rows="10" class="form-control" style="resize: none;" name="message"></textarea>
                    <small class="text-danger">
                        @error('message')
                            {{ 'The message field is required' }}
                        @enderror
                    </small>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="isAgreeToTerms">
                        <label class="form-check-label fs-14" for="flexCheckDefault">
                            By clicking I conform I have read the above fine print and agree to bound by them.
                        </label>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="isAgreeToMarketing">
                        <label class="form-check-label fs-14" for="flexCheckDefault">
                            I don't want to receive any offer or marketing from the Citadel
                        </label>
                    </div>

                    <button class="btn btn-dark mt-5 w-100 mb-5">Confirm & Payment</button>
                </form>
            </div>
            <div class="col-md-4 bg-white border-grey border-radius-16 price-container">
                <div class="d-flex justify-content-around align-items-center">
                    <div>
                        <img src="{{ asset('Apartment/Thubmbnail/' . $findApartment->featured_image) }}"
                            alt="{{ $findApartment->apartment_name }}"
                            class="img-fluid book-apartment-thumbnail rounded">
                    </div>
                    <div>
                        <h5 class="fs-18 ff-poppins fw-medium">{{ $findApartment->apartment_name }}</h5>
                        <p>{{ $findApartment->street_address }}</p>
                    </div>
                </div>


                <div class="d-flex justify-content-between p-2 align-items-center mb-0">
                    <h6 class="fs-18 ff-poppins">Price Per Night</h6>
                    <p class="ff-poppins fs-18">€{{ $bedroomPrice }}</p>
                </div>
                <div class="d-flex justify-content-between p-2 align-items-center mb-0">
                    <h6 class="fs-18 ff-poppins">Total Bedrooms</h6>
                    <p class="ff-poppins fs-18">{{ $bedrooms }}</p>
                </div>
                <div class="d-flex justify-content-between p-2 align-items-center">
                    <h6 class="fs-18 ff-poppins">Total Night Stay</h6>
                    <p class="ff-poppins fs-18">{{ $stayDays }} days</p>
                </div>

                <hr>

                <div class="d-flex justify-content-between p-2 align-items-center">
                    <h6 class="fs-18 ff-poppins">Total Cost</h6>
                    <p class="ff-poppins fs-18 fw-bold">€{{ $totalCost }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
