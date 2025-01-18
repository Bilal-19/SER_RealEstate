@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center ff-poppins fw-bold">Apartments</h3>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 ff-inter">
                <a href="{{ route('Add.Appartment') }}" class="btn btn-dark"><i class="fa-solid fa-circle-plus"></i> Add New
                    Apartment</a>
            </div>
        </div>

        <div class="row ff-inter">
            <div class="col-md-12">
                <form action="">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control"
                            placeholder="Search by area name, street address" autocomplete="off">
                        <button class="btn btn-dark"><i class="fa-brands fa-searchengin"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3 ff-inter">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail Image</th>
                        <th>Available From</th>
                        <th>Available Till</th>
                        <th>Favourites</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($fetchAllApartments as $rec)
                        <tr>
                            <td>{{ $rec->id }}</td>
                            <td>
                                <img src="{{ asset('Apartment/Thubmbnail/' . $rec->featuredImage) }}" alt=""
                                    class="img-fluid rounded" style="height: 200px; width: 200px; object-fit: cover;">
                            </td>
                            <td>{{ date('d-M-Y', strtotime($rec->availableFrom)) }}</td>
                            <td>{{ date('d-M-Y', strtotime($rec->availableTill)) }}</td>
                            <td class="text-center">
                                @if ($rec->isFavourite == 0)
                                    <a href="{{ route('Toggle.Fav', ['id' => $rec->id]) }}" title="Add to favourites"
                                        class="text-dark">
                                        <i class="fa-regular fa-star"></i>
                                    </a>
                                @else
                                    <a href="{{ route('Toggle.Fav', ['id' => $rec->id]) }}" title="Remove from favourites"
                                        class="text-dark">
                                        <i class="fa-solid fa-star"></i>
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Edit.Apartment', ['id' => $rec->id]) }}" class="text-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('Delete.Apartment', ['id' => $rec->id]) }}" class="text-danger">
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
