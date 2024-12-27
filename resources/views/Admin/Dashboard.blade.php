@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="ff-poppins">Dashboard</h3>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>{{$totalInquiries}}</h3>
                <p>Inquiries</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>{{$totalBookings}}</h3>
                <p>Bookings</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>{{$totalRevenue}}</h3>
                <p>Revenue</p>
            </div>
        </div>
    </div>
@endsection
