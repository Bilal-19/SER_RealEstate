@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Benefits</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Benefits') }}" class="brand-btn text-decoration-none">Add Benefits</a>
            </div>
        </div>


    </div>
@endsection
