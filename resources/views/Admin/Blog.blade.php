@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3>Blogs</h3>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="{{ route('Add.Blog') }}" class="brand-btn text-decoration-none">Publish New Blog</a>
            </div>
        </div>

    </div>


@endsection

