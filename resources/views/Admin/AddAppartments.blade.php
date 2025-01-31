@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3 ">
            <h3 class="text-center">Add New Apartment</h3>
        </div>

        <div class="row">
            <form action="{{ route('Create.Apartment') }}" enctype="multipart/form-data" method="post" class="form mb-5">
                @csrf
                <div class="col-md-10 mx-auto">
                    <div class="row mt-3">
                        <h4>General Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Area Name:</label>
                            <input class="form-control" placeholder="Enter area name" name="areaName"
                                value="{{ old('areaName') }}">
                            <small class="text-danger">
                                @error('areaName')
                                    {{ 'Please enter the name of area' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price:</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price"
                                name="apartmentPrice" value="{{ old('apartmentPrice') }}">
                            <small class="text-danger">
                                @error('apartmentPrice')
                                    {{ 'Please enter apartment price' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price (Per Night):</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price per night"
                                name="apartmentPricePerNight" value="{{ old('apartmentPricePerNight') }}">
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
                                value="{{ old('streetAddress') }}">
                            <small class="text-danger">
                                @error('streetAddress')
                                    {{ 'Please enter apartment street address' }}
                                @enderror
                            </small>
                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Location URL:</label>
                            <input class="form-control" placeholder="Enter apartment location URL"
                                name="apartmentMapLocation" value="{{ old('apartmentMapLocation') }}">
                            <small class="text-danger">
                                @error('apartmentMapLocation')
                                    {{ 'Please enter apartment map location' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Select No of Bedrooms:</label>
                            <select name="totalBedrooms" id="" class="form-select">
                                <option value="">Select</option>
                                @for ($i = 1; $i < 7; $i++)
                                    <option value={{ $i }}>{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="text-danger">
                                @error('totalBedrooms')
                                    {{ 'Please select total no of bedrooms' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Select No of Bathrooms:</label>
                            <select name="totalBathrooms" class="form-select">
                                <option value="">Select</option>
                                @for ($i = 1; $i < 4; $i++)
                                    <option value={{ $i }}>{{ $i }}</option>
                                @endfor
                            </select>
                            <small class="text-danger">
                                @error('totalBathrooms')
                                    {{ 'Please select total no of bathrooms' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Area (Square Feet):</label>
                            <input class="form-control" type="number" placeholder="Enter apartment square feet area"
                                name="apartmentAreaSqFt" value="{{ old('apartmentAreaSqFt') }}">
                            <small class="text-danger">
                                @error('apartmentAreaSqFt')
                                    {{ 'Please enter apartment area in square feet' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Description:</label>
                            <textarea class="form-control" rows="5" placeholder="Enter apartment description" style="resize: none;" name="apartmentDescription"></textarea>
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
                            <input class="form-control" type="number" step="any" name="latitudeVal">
                            <small class="text-danger">
                                @error('latitudeVal')
                                    {{ 'Please enter latitude value' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Enter longitude value:</label>
                            <input class="form-control" type="number" step="any" name="longitudeVal">
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
                            <input class="form-control" type="date" name="availableFrom">
                            <small class="text-danger">
                                @error('availableFrom')
                                    {{ 'Please select the date when the apartment becomes available' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">To:</label>
                            <input class="form-control" type="date" name="availableTill">
                            <small class="text-danger">
                                @error('availableTill')
                                    {{ 'Please select the date until which the apartment is available' }}
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
                            <input class="form-control" type="file" name="featuredImg">
                            <small class="text-danger">
                                @error('featuredImg')
                                    {{ 'Please upload the featured image of apartment' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Multiple Images:</label>
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
                            <input class="form-control" type="number" step="any" placeholder="Rate cleanliness (1-10)"
                                name="cleanlinessVal">
                            <small class="text-danger">
                                @error('cleanlinessVal')
                                    {{ 'Please rate cleanliness out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Comfort Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any" placeholder="Rate comfort level (1-10)"
                                name="comfortVal">
                            <small class="text-danger">
                                @error('comfortVal')
                                    {{ 'Please rate comfort level out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Facilities Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any" placeholder="Rate facilities (1-10)"
                                name="facilityVal">
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
                                name="locationVal">
                            <small class="text-danger">
                                @error('locationVal')
                                    {{ 'Please rate location out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Staff Rating (Out of 10):</label>
                            <input class="form-control" type="number" step="any" placeholder="Rate staff (1-10)" name="staffVal">
                            <small class="text-danger">
                                @error('staffVal')
                                    {{ 'Please rate staff out of 10' }}
                                @enderror
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Value for Money (Out of 10):</label>
                            <input class="form-control" type="number" step="any" placeholder="Rate value for money (1-10)"
                                name="valueForMoney">
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
                            <input class="form-control" type="number" step="any" placeholder="Rate WiFi quality (1-10)"
                                name="internetQuality">
                            <small class="text-danger">
                                @error('facilityVal')
                                    {{ 'Please rate internet quality out of 10' }}
                                @enderror
                            </small>
                        </div>
                    </div>

                    {{-- <div class="row mt-3">
                        <h4>Property Amenities</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label mb-0">Internet Availablity?</label>
                            <select class="form-select" name="haveInternet">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Kitchen Availablity?</label>
                            <select class="form-select" name="haveKitchen">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Living Area Included?</label>
                            <select class="form-select" name="haveLivingArea">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Bedroom Included?</label>
                            <select class="form-select" name="haveBedroom">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label class="form-label mb-0">Room Amenities Provided?</label>
                            <select class="form-select" name="haveRoomAmenities">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Building Features?</label>
                            <select class="form-select" name="haveBuildingCharacteristics">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Parking Available?</label>
                            <select class="form-select" name="haveParking">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Outdoor View Availability?</label>
                            <select class="form-select" name="haveOutdoorView">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label class="form-label mb-0">Media & Technology Features?</label>
                            <select class="form-select" name="haveMediaAndTechnology">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Bathroom Included?</label>
                            <select class="form-select" name="haveBathroom">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Pets Allowed?</label>
                            <select class="form-select" name="havePets">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Miscellaneous Features?</label>
                            <select class="form-select" name="haveMiscellaneous">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <button class="brand-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
