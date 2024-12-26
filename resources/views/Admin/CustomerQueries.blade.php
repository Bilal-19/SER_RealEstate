@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Customer Enquiries</h3>
        </div>

        <div class="row">
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
