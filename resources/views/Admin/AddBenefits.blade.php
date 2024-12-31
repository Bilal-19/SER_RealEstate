@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Add New Amenity</h3>
        </div>

        <div class="row">
            <form action="{{ route('Create.Benefit') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Upload an Icon Image for Amenity </label>
                    <input type="file" name="icon" class="form-control">
                    <small class="text-danger">
                        @error('icon')
                            {{ 'Please upload the image of amenity icon' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter the Name of Amenity: </label>
                    <input type="text" name="amenityName" class="form-control" placeholder="Wi-Fi">
                    <small class="text-danger">
                        @error('amenityName')
                            {{ 'Please enter the name of amenity' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label">Enter the Description of Amenity: </label>
                    <textarea type="text" name="amenityDescription" rows="5" style="resize: none;"
                        placeholder="Enjoy high-speed internet connectivity...." class="form-control"></textarea>
                        <small class="text-danger">
                            @error('amenityDescription')
                                {{ 'Please write the description of amenity' }}
                            @enderror
                        </small>
                    </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
