@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold  text-center">Users</h3>
        </div>

        <div class="row mt-3 ff-inter">
            <div class="col-md-4">
                <a href="{{ route('View.AddUser') }}" class="btn btn-dark"><i class="fa-solid fa-circle-plus"></i> Add New
                    User</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registration Date & Time</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($fetchAllUsers as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ date('d M Y', strtotime($record->created_at)) }} |
                                {{ date('h:i a', strtotime($record->created_at)) }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('ResetPassword', ['id' => $record->id]) }}" class="text-primary"
                                    title="Reset Password"><i class="fas fa-key"></i></a>
                                <a href="{{ route('DeleteUserAccount', ['id' => $record->id]) }}" class="text-danger"
                                    title="Delete Account"><i class="fas fa-user-slash"></i></a>
                                <a href="{{ route('EditAccount', ['id' => $record->id]) }}" class="text-primary"
                                    title="Edit Account"><i class="fas fa-user-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
