@extends('AdminLayout.DashboardTemplate')

@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center">Edit Testimonial</h3>
        </div>

        <div class="row">
            <form action="{{route("Admin.UpdateTestimonial", ["id" => $findRecord->id])}}" method="post">
                @csrf
                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Update Client Name: </label>
                    <input type="text" class="form-control" required name="client_name" value="{{$findRecord->name}}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Update Client Message: </label>
                    <textarea class="form-control" required name="client_message" rows="5" style="resize: none;">{{$findRecord->message}}</textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Rate (out of 5): </label>
                    <select class="form-select" required name="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{$findRecord->rating == $i ? 'selected': ''}}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
