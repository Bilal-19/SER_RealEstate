@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center ff-poppins fw-bold">Customer Inquiries</h3>
        </div>

        <div class="row ff-inter">
            <div class="col-md-10">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Message</th>
                    </tr>

                    @foreach ($fetchQueries as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>{{ $rec->name }}</td>
                            <td>{{ $rec->email }}</td>
                            <td>{{ $rec->message }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
