@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Edit Benefits</h3>
        </div>

        <div class="row">
            <form action="{{route('Update.Benefit', ['id' => $fetchBenefit->id])}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <p class="mb-0">Benefit Icon Preview Image: </p>
                    <img src="{{asset('Amenity/'.$fetchBenefit->amenity_icon)}}" alt="">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Benefit Icon Image: </label>
                    <input type="file" name="icon" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Benefit Name: </label>
                    <input type="text" name="amenityName" class="form-control" placeholder="Wi-Fi"
                        value="{{ $fetchBenefit->amenity_text }}">
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label">Enter Benefit Description: </label>
                    <textarea type="text" name="amenityDescription" rows="5" style="resize: none;"
                         class="form-control">{{ $fetchBenefit->amenity_description }}</textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
