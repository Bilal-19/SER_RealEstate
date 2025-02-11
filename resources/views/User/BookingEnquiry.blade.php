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
        @media screen and (max-width: 768px){
            .mt-sm-150{
                margin-top: 150px;
            }
        }
    </style>
@endpush

@push('CTA')
    <div class="container-fluid mt-150 mt-sm-150">
        <div class="row mt-5">
            <div class="col-md-9 mx-auto">
                <h2 class="text-center fs-48 fs-sm-25">
                    Booking Enquiries
                </h2>
            </div>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('SubmitBookingEnquiry') }}" method="post" autocomplete="off">
                @csrf

                <div class="row mt-2">
                    <div class="col-md-12">
                        <input type="text" name="company_name" class="form-control" placeholder="Company Name "
                            value="{{ old('company_name') }}">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name *"
                            value="{{ old('fullname') }}">
                        <small class="text-danger">
                            @error('fullname')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                </div>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5 mb-sm-40">
                        <input type="email" name="email" class="form-control" placeholder="Email Address *"
                            value="{{ old('email') }}">
                        <small class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </small>
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

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5 mb-sm-40">
                        <input type="text" class="form-control" placeholder="Budget (£) *" id="budget-input" name="budget">
                        <small class="text-danger">
                            @error('budget')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <select name="propertyType" id="" class="form-select">
                            @php
                                $propertyTypeArr = ['House', 'Apartment', 'Room'];
                            @endphp
                            <option value="">Property Type *</option>
                            @foreach ($propertyTypeArr as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">
                            @error('propertyType')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5 mb-sm-40">
                        <input type="text" placeholder="Check In *" name="check_in" class="form-control"
                            onfocus="(this.type='date')" value="{{ old('check_in') }}">
                        <small class="text-danger">
                            @error('check_in')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>

                    <div class="col-md-5">
                        <input type="text" placeholder="Check Out *" name="check_out" class="form-control"
                            onfocus="(this.type='date')" value="{{ old('check_out') }}">
                        <small class="text-danger">
                            @error('check_out')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-12">
                        <textarea name="enquiry" class="form-control" placeholder="Enquiry *" rows="5" style="resize: none;">{{ old('enquiry') }}</textarea>
                        <small class="text-danger">
                            @error('enquiry')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-12 text-center mx-auto">
                        <button class="brand-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('script')
    <script>
        const budgetInput = document.getElementById('budget-input');

        budgetInput.addEventListener('input', function () {
          if (!this.value.startsWith('£')) {
            this.value = '£ ' + this.value.replace(/£/g, '');
          }
        });
        </script>
    @endpush
@endsection
