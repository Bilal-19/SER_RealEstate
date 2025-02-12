@extends('AdminLayout.DashboardTemplate')
@push('style')
    <style>
        .analytic-card {
            background-color: #c0c0c0;
            border-radius: 6px;
            text-align: center;
            border-top: 3px solid black;
            margin-right: 20px;
            padding: 8px 6px;
        }

        @media (max-width: 768px) {
            .analytic-card {
                margin-bottom: 10px;
                width: 60%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
@endpush
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Dashboard</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-2 analytic-card">
                <h3 class="">{{ $totalCorporateEnquiries }}</h3>
                <p class="">
                    <i class="fas fa-envelope"></i>
                    Corporate Enquiries
                </p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="">{{ $totalBookings }}</h3>
                <p class="">
                    <i class="fas fa-calendar-check"></i>
                    Total Bookings
                </p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="">£{{ $totalRevenue }}</h3>
                <p class=""><i class="fas fa-coins"></i> Total Revenue</p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="">{{ $totalApartments }}</h3>
                <p class=""><i class="fas fa-building"></i> Total Apartments</p>
            </div>
        </div>
    </div>
@endsection
