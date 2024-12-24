@extends('AdminLayout.DashboardTemplate')
<style>
    iframe {
        height: 300px;
        width: 300px;
        border-radius: 8px;
    }

    .multiple-img {
        height: 200px;
        width: 200px;
        object-fit: cover;
        margin-top: 10px;
    }
</style>
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Edit Apartments</h3>
        </div>

        <div class="row">
            <form action="{{route('Update.Apartment', ['id' => $findApartment->id])}}" enctype="multipart/form-data" method="post" class="form mb-5">
                @csrf
                <div class="col-md-10 mx-auto">
                    <div class="row mt-3">
                        <h4>General Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Area Name:</label>
                            <input class="form-control" placeholder="Enter area name" name="areaName"
                                value="{{ $findApartment->area_name }}">
                            <small class="text-danger">
                                @error('areaName')
                                    {{ 'Please enter the name of area' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price:</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price"
                                name="apartmentPrice" value="{{ $findApartment->price }}">
                            <small class="text-danger">
                                @error('apartmentPrice')
                                    {{ 'Please enter apartment price' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price (Per Night):</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price per night"
                                name="apartmentPricePerNight" value="{{ $findApartment->price_per_night }}">
                            <small class="text-danger">
                                @error('apartmentPricePerNight')
                                    {{ 'Please enter apartment price per night' }}
                                @enderror
                            </small>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Street Address:</label>
                            <input class="form-control" placeholder="Enter street address" name="streetAddress"
                                value="{{ $findApartment->street_address }}">
                            <small class="text-danger">
                                @error('streetAddress')
                                    {{ 'Please enter apartment street address' }}
                                @enderror
                            </small>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12">
                            <p class="mb-0">Current Location: </p>
                            {!! $findApartment->map_location !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Location URL:</label>
                            <input class="form-control" placeholder="Enter apartment location URL"
                                name="apartmentMapLocation" value="{{ $findApartment->map_location }}">
                            <small class="text-danger">
                                @error('apartmentMapLocation')
                                    {{ 'Please enter apartment map location' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Select No of Bedrooms:</label>
                            <select name="totalBedrooms" id="" class="form-select">
                                @for ($i = 1; $i < 7; $i++)
                                    <option value={{ $i }}
                                        {{ $findApartment->total_bedrooms == $i ? 'selected' : '' }}>{{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <small class="text-danger">
                                @error('totalBedrooms')
                                    {{ 'Please select total no of bedrooms' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Select No of Bathrooms:</label>
                            <select name="totalBathrooms" class="form-select">
                                @for ($i = 1; $i < 4; $i++)
                                    <option value={{ $i }}
                                        {{ $findApartment->total_bathrooms == $i ? 'selected' : '' }}>{{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <small class="text-danger">
                                @error('totalBathrooms')
                                    {{ 'Please select total no of bathrooms' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Description:</label>
                            <textarea class="form-control" rows="5" placeholder="Enter apartment description" style="resize: none;"
                                name="apartmentDescription">{{ $findApartment->description }}</textarea>
                            <small class="text-danger">
                                @error('apartmentDescription')
                                    {{ 'Please write brief description about this apartment' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Enter latitude value:</label>
                            <input class="form-control" type="number" step="any" name="latitudeVal"
                                value="{{ $findApartment->latitude }}">
                            <small class="text-danger">
                                @error('latitudeVal')
                                    {{ 'Please enter latitude value' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Enter longitude value:</label>
                            <input class="form-control" type="number" step="any" name="longitudeVal"
                                value="{{ $findApartment->longitude }}">
                            <small class="text-danger">
                                @error('longitudeVal')
                                    {{ 'Please enter longitude value' }}
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
                            <input class="form-control" type="date" name="availableFrom"
                                value="{{ $findApartment->availableFrom }}">
                            <small class="text-danger">
                                @error('availableFrom')
                                    {{ 'Please select the date when the apartment becomes available' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">To:</label>
                            <input class="form-control" type="date" name="availableTill"
                                value="{{ $findApartment->availableTill }}">
                            <small class="text-danger">
                                @error('availableTill')
                                    {{ 'Please select the date until which the apartment is available' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Featured Images Preview</h4>
                    </div>

                    <div class="row mt-3 d-flex justify-content-between align-items-center">
                        <div class="col-md-5">
                            <img src="{{ asset('Apartment/Thubmbnail/' . $findApartment->featuredImage) }}"
                                alt="" class="img-fluid rounded">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Multiple Images Preview</h4>
                    </div>

                    <div class="row">
                        @foreach ($images as $img)
                            <div class="col-md-3">
                                <img src="{{ asset($img) }}" alt="" class="img-fluid rounded multiple-img">
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-3">
                        <h4>Property Images</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Featured Image (Optional):</label>
                            <input class="form-control" type="file" name="featuredImg">
                            <small class="text-danger">
                                @error('featuredImg')
                                    {{ 'Please upload the featured image of apartment' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Multiple Images (Optional):</label>
                            <input class="form-control" type="file" multiple name="apartmentMultImages[]">
                            <small class="text-danger">
                                @error('apartmentMultImages')
                                    {{ 'Please upload multiple images of apartment' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Reviews</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Cleanliness Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any"
                                placeholder="Rate cleanliness (1-10)" name="cleanlinessVal"
                                value="{{ $findApartment->cleanlinessVal }}">
                            <small class="text-danger">
                                @error('cleanlinessVal')
                                    {{ 'Please rate cleanliness out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Comfort Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any"
                                placeholder="Rate comfort level (1-10)" name="comfortVal"
                                value="{{ $findApartment->comfortVal }}">
                            <small class="text-danger">
                                @error('comfortVal')
                                    {{ 'Please rate comfort level out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Facilities Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any"
                                placeholder="Rate facilities (1-10)" name="facilityVal"
                                value="{{ $findApartment->facilitiesVal }}">
                            <small class="text-danger">
                                @error('facilityVal')
                                    {{ 'Please rate provided facilities out of 10' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Location Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any" placeholder="Rate location (1-10)"
                                name="locationVal" value="{{ $findApartment->locationVal }}">
                            <small class="text-danger">
                                @error('locationVal')
                                    {{ 'Please rate location out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Staff Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any" placeholder="Rate staff (1-10)"
                                name="staffVal" value="{{ $findApartment->staffVal }}">
                            <small class="text-danger">
                                @error('staffVal')
                                    {{ 'Please rate staff out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Value for Money (Out of 10):</label>
                            <input class="form-control" type="number" step="any"
                                placeholder="Rate value for money (1-10)" name="valueForMoney"
                                value="{{ $findApartment->value_for_money }}">
                            <small class="text-danger">
                                @error('valueForMoney')
                                    {{ 'Please rate out of 10 for the value for money' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">WiFi Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any"
                                placeholder="Rate WiFi quality (1-10)" name="internetQuality"
                                value="{{ $findApartment->free_wifi_val }}">
                            <small class="text-danger">
                                @error('facilityVal')
                                    {{ 'Please rate internet quality out of 10' }}
                                @enderror
                            </small>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-3">
                            <button class="brand-btn">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
