@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Add New <span class="fw-bold">Standard</span></h3>
        </div>

        <div class="row">
            <form action="{{ route('Create.Standard') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Upload Icon: </label>
                    <input type="file" name="standard_icon" class="form-control">
                    <small class="text-danger">
                        @error('icon')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Standard Name: </label>
                    <input type="text" name="standard_text" class="form-control" placeholder="Wi-Fi">
                    <small class="text-danger">
                        @error('amenityName')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
