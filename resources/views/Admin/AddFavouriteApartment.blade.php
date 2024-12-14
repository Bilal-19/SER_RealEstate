@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Add <span class="text-light-brown">Favourite Apartment</span></h3>
        </div>

        <div class="row mx-auto">
            <form action="{{route('Create.Favourite.Apartment')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Upload Featured Image: </label>
                    <input type="file" name="featuredImg" class="form-control">
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <label class="form-label mb-0">Enter Apartment Name: </label>
                    <input type="text" name="apartmentName" class="form-control" placeholder="Enter apartment name">
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <label class="form-label mb-0">Enter Apartment Location: </label>
                    <input type="text" name="apartmentLocation" class="form-control" placeholder="Enter apartment location">
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <label class="form-label mb-0">Enter Apartment Price: </label>
                    <input type="number" name="apartmentPrice" class="form-control" placeholder="Enter apartment price">
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <label class="form-label mb-0">Enter Number of Bedrooms: </label>
                    <input type="number" name="totalBedroom" class="form-control" placeholder="Enter total no of bedroom">
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <label class="form-label mb-0">Enter Number of Bathroom: </label>
                    <input type="number" name="totalBathroom" class="form-control" placeholder="Enter total no of bathroom">
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <button class="brand-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
