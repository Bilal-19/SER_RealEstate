@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="ff-poppins">Dashboard</h3>
        </div>

        <div class="row d-flex justify-content-around">
            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>2000+</h3>
                <p>Customers</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>1500+</h3>
                <p>Apartments</p>
            </div>

            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>20+</h3>
                <p>Amenities</p>
            </div>
        </div>

        <div class="row d-flex justify-content-around mt-3">
            <div class="col-md-3 card bg-light-brown text-light text-center">
                <h3>300+</h3>
                <p>Blogs</p>
            </div>
        </div>
    </div>
@endsection
