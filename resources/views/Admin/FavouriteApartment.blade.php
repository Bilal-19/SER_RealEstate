@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Favourite Apartments</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Favourite.Apartment') }}" class="brand-btn text-decoration-none">Add Favourite
                    Apartment</a>
            </div>
        </div>


    </div>
@endsection
