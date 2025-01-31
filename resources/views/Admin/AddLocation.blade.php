@extends('AdminLayout.DashboardTemplate')

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Add New <span class="fw-bold">Location</span></h3>
        </div>

        <div class="row">
            <form action="{{route("Admin.CreateLocation")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label">Upload Thumbnail Image: </label>
                    <input type="file" class="form-control" required name="thumbnail">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Location Name: </label>
                    <input type="text" class="form-control" required name="location">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
