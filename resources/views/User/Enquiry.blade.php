@extends('UserLayout.main')

@push('style')
    <style>
        .form-control, .form-select {
            background-color: #c0c0c0 !important;
            color: white !important;
        }

        .form-control::placeholder {
            color: white;
        }

        button {
            border: none;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto">
            <h2 class="text-center">
                Join Us
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <form action="#" method="post" autocomplete="off">
                @csrf
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                        <small class="text-danger">
                            @error('fullname')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                        <small class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                        <small class="text-danger">
                            @error('company_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                        <small class="text-danger">
                            @error('phone_number')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <textarea name="enquiry" class="form-control" placeholder="Enquiry" rows="5"></textarea>
                        <small class="text-danger">
                            @error('enquiry')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-3 mx-auto">
                        <button class="brand-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
