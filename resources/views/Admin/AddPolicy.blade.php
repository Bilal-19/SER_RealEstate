@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center  fw-bold">Add New Policy</h3>
        </div>

        <div class="row">
            <form action="{{ route('Create.Policy') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Upload Policy Icon Image: </label>
                    <input type="file" name="icon" class="form-control">
                    <small class="text-danger">
                        @error('icon')
                            {{ 'Please upload policy related icon' }}
                        @enderror
                    </small>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Policy Name: </label>
                    <input type="text" name="policyName" class="form-control" placeholder="Enter Policy Name">
                    <small class="text-danger">
                        @error('policyName')
                            {{ 'Please enter policy name' }}
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
