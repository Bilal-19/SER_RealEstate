@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center mt-3">Frequently Asked<span class="fw-bold"> Questions</span></h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('Admin.AddFAQ') }}" class="btn btn-dark">Add New FAQ</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllFAQs as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->question }}</td>
                            <td>{!! $record->answer !!}</td>
                            <td class="text-center">
                                <a href="{{route("Admin.EditFAQ", ["id"=>$record->id])}}" class="text-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route("Admin.deleteFAQ", ["id"=>$record->id])}}" class="text-danger">
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
