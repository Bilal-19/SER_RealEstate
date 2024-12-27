@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="ff-poppins">Dashboard</h3>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3 class="ff-poppins">{{$totalInquiries}}</h3>
                <p class="ff-inter">Inquiries</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3 class="ff-poppins">{{$totalBookings}}</h3>
                <p class="ff-inter">Bookings</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3 class="ff-poppins">{{$totalRevenue}}</h3>
                <p class="ff-inter">Revenue</p>
            </div>
        </div>
    </div>
@endsection
