@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Edit Policy</h3>
        </div>

        <div class="row">
            <form action="{{ route('Update.Policy', ['id' => $findPolicy->id]) }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <p class="mb-0">Policy Icon Preview Image: </p>
                    <img src="{{ asset('Policy/Icons/' . $findPolicy->policy_icon) }}" alt="">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Policy Icon Image: </label>
                    <input type="file" name="icon" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Policy Text: </label>
                    <input type="text" name="policyName" class="form-control" placeholder="Wi-Fi"
                        value="{{ $findPolicy->policy_name }}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
