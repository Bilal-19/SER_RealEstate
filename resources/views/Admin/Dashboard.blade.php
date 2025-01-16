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
            <h3 class="ff-poppins fw-bold text-center">Dashboard</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-2 analytic-card">
                <h3 class="ff-poppins">{{ $totalInquiries }}</h3>
                <p class="ff-inter">
                    <i class="fas fa-envelope"></i>
                    Total Inquiries
                </p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="ff-poppins">{{ $totalBookings }}</h3>
                <p class="ff-inter">
                    <i class="fas fa-calendar-check"></i>
                    Total Bookings
                </p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="ff-poppins">€{{ $totalRevenue }}</h3>
                <p class="ff-inter"><i class="fas fa-coins"></i> Total Revenue</p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="ff-poppins">{{ $totalBlogs }}</h3>
                <p class="ff-inter"><i class="fas fa-file-alt"></i> Published Blogs</p>
            </div>

            <div class="col-md-2 analytic-card">
                <h3 class="ff-poppins">{{ $totalApartments }}</h3>
                <p class="ff-inter"><i class="fas fa-building"></i> Total Apartments</p>
            </div>
        </div>
    </div>
@endsection
