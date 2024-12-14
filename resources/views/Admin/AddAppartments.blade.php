@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Add Apartments</h3>
        </div>

        <div class="row">
            <form action="" autocomplete="off">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <h4>General Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Area Name:</label>
                            <input class="form-control" placeholder="Enter area name">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Apartment Price:</label>
                            <input class="form-control" type="number" placeholder="Enter apartment price">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Enter Feedback:</label>
                            <input class="form-control" placeholder="Enter feedback">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Street Address:</label>
                            <input class="form-control" placeholder="Enter street address">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label class="form-label mb-0">Enter Check-In Date:</label>
                            <input class="form-control" type="date">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-0">Enter Check-Out Date:</label>
                            <input class="form-control" type="date">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-0">Enter Apartment Rating:</label>
                            <input class="form-control" type="number" min="1" max="10"
                                placeholder="Enter apartment rating">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Location URL:</label>
                            <input class="form-control" placeholder="Enter apartment location URL">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label mb-0">Enter Apartment Description:</label>
                            <textarea class="form-control" rows="5" placeholder="Enter apartment description" style="resize: none;"></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Surroundings</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mb-0">Upload Neighborhood Image:</label>
                            <input class="form-control" type="file">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Reviews</h4>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Cleanliness Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate cleanliness (1-10)">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Comfort Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate comfort level (1-10)">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Facilities Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate facilities (1-10)">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Location Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate location (1-10)">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Staff Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate staff (1-10)">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-0">Value for Money (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate value for money (1-10)">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">WiFi Rating (Out of 10):</label>
                            <input class="form-control" type="number" placeholder="Rate WiFi quality (1-10)">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h4>Property Amenities</h4>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
