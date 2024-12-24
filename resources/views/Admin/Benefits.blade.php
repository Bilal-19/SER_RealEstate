@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Benefits</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Benefits') }}" class="brand-btn text-decoration-none">Add Benefits</a>
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
                                <img src="{{asset('Benefits/'.$rec->benefit_icon)}}" alt="{{$rec->benefit_text}}">
                            </td>
                            <td>{{$rec->benefit_text}}</td>
                            <td>{{$rec->benefit_description}}</td>
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
