@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3 ">
            <h3 class="text-center">Add New <span class="fw-bold">Apartment</span></h3>
        </div>

        <div class="row">
            <form action="{{ route('Create.Apartment') }}" enctype="multipart/form-data" method="post" class="form mb-5"
                autocomplete="off">
                @csrf
                <div class="col-md-10 mx-auto">
                    <div class="row mt-3">
                        <h4>General Information</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Apartment Name:</label>
                            <input class="form-control" placeholder="Mayfair, London" name="apartment_name"
                                value="{{ old('apartment_name') }}">
                            <small class="text-danger">
                                @error('apartment_name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Select Apartment Location:</label>
                            <select name="apartment_location" class="form-select">
                                @foreach ($fetchLocArr as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">
                                @error('apartment_location')
                                    {{ 'Please select apartment location' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Street Address:</label>
                            <input class="form-control" placeholder="Park Lane, W1K 1PN" name="street_address"
                                value="{{ old('street_address') }}">
                            <small class="text-danger">
                                @error('street_address')
                                    {{ 'Please enter apartment street address' }}
                                @enderror
                            </small>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">One Bedroom Price (Per Night):</label>
                            <input class="form-control" type="number" placeholder="€500 per night" name="one_bed_price"
                                value="{{ old('one_bed_price') }}">
                            <small class="text-danger">
                                @error('one_bed_price')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Two Bedroom Price (Per Night):</label>
                            <input class="form-control" type="number" placeholder="€1000 per night" name="two_bed_price"
                                value="{{ old('two_bed_price') }}">
                            <small class="text-danger">
                                @error('two_bed_price')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Apartment Map Location:</label>
                            <input class="form-control" placeholder="Enter apartment location URL"
                                name="apartment_map_location" value="{{ old('apartment_map_location') }}">
                            <small class="text-danger">
                                @error('apartment_map_location')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label class="form-label mb-0">Latitude:</label>
                            <input class="form-control" type="number" step="any" name="latitude">
                            <small class="text-danger">
                                @error('latitude')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Longitude:</label>
                            <input class="form-control" type="number" step="any" name="longitude">
                            <small class="text-danger">
                                @error('longitude')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Apartment Type:</label>
                            <select name="apartment_type" class="form-select">
                                @php
                                    $apartmentTypeArr = ['House', 'Apartment', 'Rooms'];
                                @endphp
                                @foreach ($apartmentTypeArr as $val)
                                    <option value="{{ $val }}">{{ $val }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">
                                @error('apartmentType')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Area (Square Feet):</label>
                            <input class="form-control" type="number" placeholder="1000 Sq.Ft" name="sq_feet_area"
                                value="{{ old('sq_feet_area') }}">
                            <small class="text-danger">
                                @error('sq_feet_area')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Apartment Description:</label>
                            <textarea class="form-control" rows="5"
                                placeholder="Situated in London's most prestigious neighborhood, Mayfair, this penthouse offers unmatched luxury...."
                                style="resize: none;" name="apartment_description"></textarea>
                            <small class="text-danger">
                                @error('apartment_description')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <h4>Select Availability Date</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0">From:</label>
                            <input class="form-control" type="date" name="available_from">
                            <small class="text-danger">
                                @error('available_from')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">To:</label>
                            <input class="form-control" type="date" name="available_till">
                            <small class="text-danger">
                                @error('available_till')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Images</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Featured Image:</label>
                            <input class="form-control" type="file" name="featured_img">
                            <small class="text-danger">
                                @error('featured_img')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Multiple Images:</label>
                            <input class="form-control" type="file" multiple name="apartment_multi_images[]">
                            <small class="text-danger">
                                @error('apartment_multi_images')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <button class="btn btn-dark">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
