@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Add Apartments</h3>
        </div>

        <div class="row">
            <form action="{{route('Create.Apartment')}}" enctype="multipart/form-data" method="post" class="form mb-5">
                @csrf
                <div class="col-md-10 mx-auto">
                    <div class="row mt-3">
                        <h4>General Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Area Name:</label>
                            <input class="form-control" placeholder="Enter area name" name="areaName" value="{{old('areaName')}}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price:</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price" name="apartmentPrice" value="{{old('apartmentPrice')}}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price (Per Night):</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price per night" name="apartmentPricePerNight" value="{{old('apartmentPricePerNight')}}">
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Street Address:</label>
                            <input class="form-control" placeholder="Enter street address" name="streetAddress" value="{{old('streetAddress')}}">
                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Location URL:</label>
                            <input class="form-control" placeholder="Enter apartment location URL" name="apartmentMapLocation" value="{{old('apartmentMapLocation')}}">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Select No of Bedrooms:</label>
                            <select name="totalBedrooms" id="" class="form-select">
                                @for ($i = 1; $i < 7; $i++)
                                    <option value={{$i}}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Select No of Bathrooms:</label>
                            <select name="totalBathrooms" class="form-select">
                                @for ($i = 1; $i < 4; $i++)
                                    <option value={{$i}}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Description:</label>
                            <textarea class="form-control" rows="5" placeholder="Enter apartment description" style="resize: none;" name="apartmentDescription">
                            </textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Select Availability Date</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label mb-0">From:</label>
                            <input class="form-control" type="date" name="availableFrom">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">To:</label>
                            <input class="form-control" type="date" name="availableTill">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Images</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Featured Image:</label>
                            <input class="form-control" type="file" name="featuredImg">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Apartment Multiple Images:</label>
                            <input class="form-control" type="file" multiple name="apartmentMultImages[]">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Reviews</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Cleanliness Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate cleanliness (1-10)" name="cleanlinessVal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Comfort Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate comfort level (1-10)" name="comfortVal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Facilities Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate facilities (1-10)" name="facilityVal">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Location Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate location (1-10)" name="locationVal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Staff Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate staff (1-10)" name="staffVal">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Value for Money (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate value for money (1-10)" name="valueForMoney">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">WiFi Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate WiFi quality (1-10)" name="internetQuality">
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
