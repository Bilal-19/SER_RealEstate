@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center mt-3">Booking <span class="fw-bold">Enquiries</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Client Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Phone Number</th>
                        <th>Budget</th>
                        <th>Property Size</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>

                    @foreach ($fetchQueries as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>{{ $rec->company_name }}</td>
                            <td>{{ $rec->full_name }}</td>
                            <td>{{ $rec->email_address }}</td>
                            <td>{{ $rec->enquiry_message }}</td>
                            <td>{{ $rec->phone_number }}</td>
                            <td>{{ $rec->budget }}</td>
                            <td>{{ $rec->property_size }}</td>
                            <td>{{ $rec->check_in }}</td>
                            <td>{{ $rec->check_out }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
