@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center mt-3">Corporate <span class="fw-bold">Enquiries</span></h3>
        </div>

        <div class="row">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Phone Number</th>
                        <th>Duration of Stay</th>
                        <th>Inquiry Date</th>
                    </tr>

                    @foreach ($fetchQueries as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>{{ $rec->name }}</td>
                            <td>{{ $rec->email }}</td>
                            <td>{{ $rec->enquiry_message }}</td>
                            <td>{{ $rec->phone_number }}</td>
                            <td>{{ $rec->duration_of_stay }}</td>
                            <td>
                                {{ date('d M Y', strtotime($rec->created_at)) }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
