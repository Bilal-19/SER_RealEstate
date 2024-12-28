@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center ff-poppins fw-bold">Amenities</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Benefits') }}" class="brand-btn text-decoration-none">
                    <i class="fa-solid fa-circle-plus"></i>
                    Add Amenities</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchBenefits as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>
                                <img src="{{asset('Amenity/'.$rec->amenity_icon)}}" alt="{{$rec->amenity_text}}">
                            </td>
                            <td>{{$rec->amenity_text}}</td>
                            <td>{{$rec->amenity_description}}</td>
                            <td class="text-center">
                                <a href="{{route('Edit.Benefit', ['id' => $rec->id])}}" class="text-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('Delete.Benefit', ['id' => $rec->id])}}" class="text-danger">
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
