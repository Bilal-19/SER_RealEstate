@extends('UserLayout.main')

@push('footer-cta')
    <div class="container-fluid footer footer-bottom-border" id="footer_bg">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <h4 class="ff-inter text-light">Why rent a hotel when you enjoy an apartment?</h4>
                <p class="ff-inter text-light">Feel like home at one of our modern apartments located in the heart of
                    London.
                    Make your own meals, order a
                    take-away, enjoy the space and privacy, just like home.</p>
            </div>
            <div class="col-md-3">
                <a href="" class="footer-search-btn">Search</a>
            </div>
        </div>
    </div>
@endpush
@section('user-main-section')
    <div class="container-fluid">
        <div class="row d-flex justify-content-around align-items-center">
            <div class="col-md-5">
                <p class="text-uppercase">Corporate</p>
                <p>
                    Fully serviced apartment stays are essential for many companies. Relocating an employee to another
                    location, especially internationally can be daunting.
                    <br><br>
                    Sterling Executive Residential has a wide variety of apartments in central London to suit both company needs and the
                    comfort of the employee.
                    <br><br>
                    Our team is here to assist in all aspects of corporate relocation.
                    <br><br>
                    We have guests from a wide range of industries, including IT, Business Travelers, Consultancy Firms, Big
                    Pharma, Automotive,
                    Construction, Government, and Telecommunications.
                </p>
            </div>
            <div class="col-md-5">
                <p>Many of our construction clients come in from other locations in the UK to work on sites in central
                    London.
                    <br><br>
                    We are a host to global firms listed on the FTSE including Fortune 500. Simplicity is the key
                    to our success. Sterling Executive Residential offers a smooth rental process with flexibility for longer term
                    stays.
                    <br><br>
                    There are no tenancy agreements to deal with or hidden broker fees.
                    <br><br>
                    Booking online or
                    through the guest relations team will offer you the best rates.
                </p>
                <p><i class="fa-solid fa-phone"></i> +44 7921919426</p>
                <p><i class="fa-solid fa-envelope"></i> zain.rav@gmail.com</p>
            </div>
        </div>
    </div>

    {{-- Display the Neighborhood data --}}
@endsection
