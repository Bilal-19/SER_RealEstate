@extends('AdminLayout.DashboardTemplate')

@push('style')
    <style>
    </style>
@endpush

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center fw-bold">Client Testimonials</h3>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('Admin.AddTestimonials') }}" class="btn btn-dark">Add New Testimonials</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Client Message</th>
                        <th>Rating (Out of 5)</th>
                        <th>Visibility</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllTestimonials as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->message }}</td>
                            <td>{{ $record->rating }}</td>
                            <td>{{ $record->visibility }}</td>
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
