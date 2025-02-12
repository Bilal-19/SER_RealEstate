@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Dashboard</h3>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <h3>Apartments</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
             <div class="row">
                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fas fa-building mx-1"></i>
                        {{ $totalApartments }} Apartments
                    </h5>
                </div>

                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fa-solid fa-check-circle mx-1"></i> {{ $totalAvailableApartments }} Available
                    </h5>
                </div>

                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fa-solid fa-house-lock mx-2"></i> {{ $totalBookedApartments }} Booked
                    </h5>
                </div>
             </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-11 mx-auto">
                <h3>Enquiries</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
             <div class="row">
                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fa-solid fa-landmark mx-2"></i>
                        {{ $totalCorporateEnquiries }} Corporate
                    </h5>
                </div>

                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fa-solid fa-info-circle mx-2"></i> {{ $totalGeneralEnquiries }} General
                    </h5>
                </div>

                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fa-solid fa-calendar-check mx-2"></i> {{ $totalBookingEnquiries }} Booking
                    </h5>
                </div>

                <div class="col-md-3 analytic-card">
                    <h5>
                        <i class="fa-solid fa-handshake mx-3"></i> {{ $totalPartnershipEnquiries }} Join Sterling
                    </h5>
                </div>
             </div>
            </div>
        </div>
    </div>
@endsection
