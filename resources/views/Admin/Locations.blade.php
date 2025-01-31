@extends('AdminLayout.DashboardTemplate')

@push('style')
    <style>
        .thumbnail-img{
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
    </style>
@endpush

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center fw-bold">Our Locations</h3>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('Admin.AddLocation') }}" class="btn btn-dark">Add New Location</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail Image</th>
                        <th>Location</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllLocations as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                <img src="{{ asset('Location/' . $record->thumbnail_img) }}" alt="{{$record->location}}" class="img-fluid thumbnail-img">
                            </td>
                            <td>{{$record->location}}</td>
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
