@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center fw-bold">Standards</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Standard') }}" class="btn btn-dark text-decoration-none">
                    <i class="fa-solid fa-circle-plus"></i>
                    Add Standard</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchStandards as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>
                                <img src="{{asset('Standards/'.$rec->standard_icon)}}" alt="{{$rec->standard_text}}" class="img-fluid">
                            </td>
                            <td>{{$rec->standard_text}}</td>
                            <td class="text-center">
                                <a href="{{route('Edit.Standard', ['id' => $rec->id])}}" class="text-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('Delete.Standard', ['id' => $rec->id])}}" class="text-danger">
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
