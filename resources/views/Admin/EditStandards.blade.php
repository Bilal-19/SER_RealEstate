@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Edit Standard</h3>
        </div>

        <div class="row">
            <form action="{{route('Update.Standard', ['id' => $fetchBenefit->id])}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <p class="mb-0">Benefit Icon Preview Image: </p>
                    <img src="{{asset('Standards/'.$fetchBenefit->standard_icon)}}" alt="" name="standard_icon">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Standard Icon Image (Optional): </label>
                    <input type="file" name="standard_icon" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Benefit Name: </label>
                    <input type="text" name="standard_text" class="form-control" placeholder="Wi-Fi"
                        value="{{ $fetchBenefit->standard_text }}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
