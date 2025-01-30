@extends('UserLayout.main')

@push('style')
    <style>
        .form-control {
            background-color: #c0c0c0 !important;
            color: white !important;
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
                Contact Us
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <form action="" autocomplete="off">
                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5">
                        <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <input type="text" name="company_name" class="form-control" placeholder="Duration of Stay">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <textarea name="enquiry" class="form-control" placeholder="Enquiry" rows="5"></textarea>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-3 mx-auto">
                        <button class="brand-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
