@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="ff-poppins fw-bold text-center">Dashboard</h3>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-3 card bg-light-brown text-light text-center pt-2 pb-2">
                <h3 class="ff-poppins">{{$totalInquiries}}</h3>
                <p class="ff-inter">Total Inquiries</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center pt-2 pb-2">
                <h3 class="ff-poppins">{{$totalBookings}}</h3>
                <p class="ff-inter">Total Bookings</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center pt-2 pb-2">
                <h3 class="ff-poppins">${{$totalRevenue}}</h3>
                <p class="ff-inter">Total Revenue</p>
            </div>
        </div>
    </div>
@endsection
