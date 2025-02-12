@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center mt-3">Join Sterling Enquiries</h3>
        </div>

        <div class="row">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Phone Number</th>
                    </tr>

                    @foreach ($fetchQueries as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>{{ $rec->full_name }}</td>
                            <td>{{ $rec->company_name }}</td>
                            <td>{{ $rec->email }}</td>
                            <td>{{ $rec->enquiry_message }}</td>
                            <td>{{ $rec->phone_number }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
