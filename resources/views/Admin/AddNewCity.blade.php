@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-5">
            <h3 class="text-center">Add New City</h3>
        </div>

        <div class="row">
            <form action="{{route('Create.City.Record')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto mb-3">
                    <label>Upload City Image: </label>
                    <input type="file" name="cityImage" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mb-3">
                    <label>Enter City Name: </label>
                    <input type="text" name="cityName" placeholder="Enter city name" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mb-3">
                    <label>Enter Country Name: </label>
                    <input type="text" name="countryName" placeholder="Enter country name" class="form-control">
                </div>

<div class="col-md-6 mx-auto">
    <button class="btn btn-outline-dark"><i class="fa-solid fa-paper-plane"></i> Submit</button>
</div>
            </form>
        </div>
    </div>
@endsection
