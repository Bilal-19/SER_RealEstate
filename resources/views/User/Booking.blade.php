@extends('UserLayout.main')
@push('style')
    <style>
        body {
            background-color: #fafafa;
        }

        .banner-img {
            background-image: url('/assets/images/available_apartment_banner.png');
            background-size: cover;
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
    </style>
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
    <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex justify-content-around">
            <div class="col-md-5 bg-white border-grey border-radius-16">
                <div class="booking-container mt-3">
                    <h4 class="ff-inter fs-20">Booking Details</h4>
                    <div class="d-flex mt-4">
                        <div>
                            <p class="ff-inter mb-0">Check In Date:</p>
                            <p class="booking-date">{{ date('d M Y', strtotime($checkIn)) }}</p>
                        </div>
                        <div class="mx-5">
                            <p class="ff-inter mb-0">Check Out Date:</p>
                            <p class="booking-date">{{ date('d M Y', strtotime($checkOut)) }}</p>
                        </div>
                    </div>

                    <p class="ff-inter mt-3">{{ $stayDays }} Night stay</p>
                </div>

                <h4 class="ff-inter fs-24 mt-5">Personal Information</h4>
                <form action="">
                    <div class="d-flex justify-content-between">
                        <div>
                            <label class="form-label fs-14 ff-inter">First Name: </label>
                            <input type="text" class="form-control ff-inter fs-16">
                        </div>

                        <div>
                            <label class="form-label fs-14 ff-inter">Last Name: </label>
                            <input type="text" class="form-control ff-inter fs-16">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            <label class="form-label fs-14 ff-inter">Email Address: </label>
                            <input type="text" class="form-control ff-inter fs-16">
                        </div>

                        <div>
                            <label class="form-label fs-14 ff-inter">Phone Number: </label>
                            <input type="text" class="form-control ff-inter fs-16">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            <label class="form-label fs-14 ff-inter">Address: </label>
                            <input type="text" class="form-control ff-inter fs-16">
                        </div>

                        <div>
                            <label class="form-label fs-14 ff-inter">Postal Code: </label>
                            <input type="text" class="form-control ff-inter fs-16">
                        </div>
                    </div>

                    <div class="mb-5 mt-3">
                        <label class="form-label fs-14 ff-inter">Country: </label>
                        <input type="text" class="form-control ff-inter fs-16">
                    </div>

                    <h5 class="ff-inter fs-20">The Fine Print</h5>
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

                    <p class="fw-medium ff-inter mb-0">Other Request</p>
                    <textarea name="" cols="30" rows="10" class="form-control" style="resize: none;"></textarea>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label fs-14" for="flexCheckDefault">
                            By clicking I conform I have read the above fine print and agree to bound by them.
                        </label>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label fs-14" for="flexCheckDefault">
                            I don’t want to receive any offer or marketing from the Citadel
                        </label>
                    </div>

                    <button class="btn btn-dark mt-5 w-100 mb-5">Confirm & Payment</button>
                </form>
            </div>
            <div class="col-md-4 bg-white border-grey border-radius-16 price-container">
                <div class="d-flex justify-content-around align-items-center">
                    <div>
                        <img src="{{ asset('Apartment/Thubmbnail/' . $findApartment->featuredImage) }}" alt=""
                            class="img-fluid book-apartment-thumbnail rounded">
                    </div>
                    <div>
                        <h5 class="fs-18 ff-poppins fw-medium">{{ $findApartment->area_name }}</h5>
                        <p>{{ $findApartment->street_address }}</p>
                    </div>
                </div>

                @php
                    $apartmentCost = $findApartment->price_per_night * $stayDays;
                    $vat = 225;

                    $totalCost = $apartmentCost + $vat;
                @endphp

                <div class="d-flex justify-content-between p-2 mt-4 align-items-center mb-0">
                    <h6 class="fs-18 ff-inter">Net Cost (${{ $findApartment->price_per_night }} * {{ $stayDays }})</h6>
                    <p class="ff-inter fs-18">${{ $apartmentCost }}</p>
                </div>

                <div class="d-flex justify-content-between p-2 align-items-center">
                    <h6 class="fs-18 ff-inter">VAT</h6>
                    <p class="ff-inter fs-18">${{ $vat }}</p>
                </div>

                <hr>

                <div class="d-flex justify-content-between p-2 align-items-center">
                    <h6 class="fs-18 ff-inter">Total Cost</h6>
                    <p class="ff-inter fs-18 fw-bold">${{ $totalCost }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
