@extends('UserLayout.main')

@push('style')
    <style>
        .thumbnail-img {
            height: 400px;
            width: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

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

@section('user-main-section')
    <div class="row mt-3 mx-auto">
        <div class="col-md-12">
            <h3>Our Locations</h3>
            <p>We offer a diverse selection of properties throughout London.</p>
        </div>
    </div>

    @isset($fetchAllLocations)
        <div class="row mx-auto">
            @foreach ($fetchAllLocations as $record)
                <div class="col-md-4 mt-3 mb-5">
                    <a href="{{route("LocationDetail", ["id"=>$record->id])}}">
                        <img src="{{ asset('Locations/' . $record->thumbnail_img) }}" alt="{{ $record->location }}"
                        class="img-fluid thumbnail-img">
                    </a>
                    <h5 class="mt-2">{{ $record->location }}</h5>
                </div>
            @endforeach
        </div>
    @endisset

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Can't find your location?</h2>
            <p>
                Not every one of our locations is featured on our website. Let us know about your enquiry and we will get
                back to you with a variety of options.
            </p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 mx-auto">
            <form action="{{route("SubmitLocationEnquiry")}}" method="post" autocomplete="off">
                @csrf
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5 mb-sm-40">
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
                    <div class="col-md-5 mb-sm-40">
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

                <div class="row d-flex justify-content-between mt-5">
                    <div class="col-md-5 mb-sm-40">
                        <input type="text" name="arrival_date" class="form-control" onfocus="(this.type='date')" placeholder="Arrival Date">
                        <small class="text-danger">
                            @error('arrival_date')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="departure_date" class="form-control" onfocus="(this.type='date')" placeholder="Departure Date">
                        <small class="text-danger">
                            @error('departure_date')
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
