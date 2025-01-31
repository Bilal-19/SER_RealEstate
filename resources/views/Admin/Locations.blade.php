@extends('AdminLayout.DashboardTemplate')

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center fw-bold">Our Locations</h3>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="{{route("Admin.AddLocation")}}" class="btn btn-dark">Add New Location</a>
            </div>
        </div>
    </div>
@endsection
