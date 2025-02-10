@extends('UserLayout.main')

@push('style')
    <style>
        .form-control,
        .form-select {
            background-color: #c0c0c0 !important;
            color: white !important;
        }

        .form-control::placeholder {
            color: white;
        }

        .brand-btn {
            font-weight: bold;
            border-radius: 12px;
            padding: 12px 30px;
        }
    </style>
@endpush

@push('CTA')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-9 mx-auto">
                <h2 class="text-center fs-48 fs-sm-25">
                    Join Us
                </h2>
            </div>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="container-fluid mt-50 mt-sm-75">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('JoinSterlingInquiry') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-5 mb-sm-40">
                            <input type="text" name="fullname" class="form-control" placeholder="Full Name *"
                                value="{{ old('fullname') }}">
                            <small class="text-danger">
                                @error('fullname')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="col-md-5">
                            <input type="email" name="email" class="form-control" placeholder="Email Address *"
                                value="{{ old('email') }}">
                            <small class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between mt-5">
                        <div class="col-md-5 mb-sm-40">
                            <input type="text" name="company_name" class="form-control" placeholder="Company Name "
                                value="{{ old('company_name') }}">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number *"
                                value="{{ old('phone_number') }}">
                            <small class="text-danger">
                                @error('phone_number')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <textarea name="enquiry" class="form-control" placeholder="Enquiry *" style="resize: none;" rows="5">{{ old('enquiry') }}</textarea>
                            <small class="text-danger">
                                @error('enquiry')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                        <div class="col-md-3 mx-auto text-center">
                            <button class="brand-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
