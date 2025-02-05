@extends('AdminLayout.DashboardTemplate')

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Edit <span class="fw-bold">Location</span></h3>
        </div>

        <div class="row">
            <form action="{{route("Admin.UpdateLocation",["id"=>$findLocation->id])}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Thumbnail Image Preview: </label>
                    <img src="{{asset("Locations/".$findLocation->thumbnail_img)}}" alt="{{$findLocation->location}}" class="img-fluid rounded">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Thumbnail Image (Optional): </label>
                    <input type="file" class="form-control" name="thumbnail">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Location Name: </label>
                    <input type="text" class="form-control" required name="location" value="{{$findLocation->location}}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
