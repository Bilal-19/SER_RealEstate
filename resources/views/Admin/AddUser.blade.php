@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="fw-bold ff-poppins text-center">Add User Account</h3>
        </div>


        <div class="row">
            <form action="{{route('CreateUserAccount')}}" method="post" autocomplete="off">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Enter your name: </label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter your email: </label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Create Account</button>
                </div>
            </form>
        </div>
    </div>
@endsection
