@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Policy</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Policy') }}" class="brand-btn text-decoration-none"><i class="fa-solid fa-circle-plus"></i> Add Policy</a>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-md-10">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllPolicies as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                <img src="{{ asset('Policy/Icons/' . $record->policy_icon) }}" alt="">
                            </td>
                            <td>{{ $record->policy_name }}</td>
                            <td class="text-center">
                                <a href="#" class="text-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#" class="text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection
