@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Add <span class="text-light-brown">Benefits</span></h3>
        </div>

        <div class="row">
            <form action="{{route('Create.Benefit')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Upload Benefit Icon Image: </label>
                    <input type="file" name="icon" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Benefit Name: </label>
                    <input type="text" name="benefitName" class="form-control" placeholder="Wi-Fi">
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label">Enter Benefit Description: </label>
                    <textarea type="text" name="benefitDescription" rows="5" style="resize: none;" placeholder="Enjoy high-speed internet connectivity...." class="form-control"></textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
