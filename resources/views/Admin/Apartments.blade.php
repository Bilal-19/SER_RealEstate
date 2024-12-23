@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Apartments</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-11 mx-auto">
                <table class="table table-striped table-bordered">
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
                            <td>{{ $rec->availableFrom }}</td>
                            <td>{{ $rec->availableTill }}</td>
                            <td class="text-center">
                                @if ($rec->isFavourite == 0)

                                        <a href="{{route('Toggle.Fav', ['id' => $rec->id])}}" title="Add to favourites" class="text-dark">
                                            <i class="fa-regular fa-star"></i>
                                        </a>
                                @else
                                        <a href="{{route('Toggle.Fav', ['id' => $rec->id])}}" title="Remove from favourites" class="text-dark">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
@endsection
