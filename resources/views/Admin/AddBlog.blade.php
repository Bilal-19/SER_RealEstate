@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center ff-poppins">Publish New Blog</h3>
        </div>

        <div class="row">
            <form action="{{route('Create.Blog')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <label class="form-label mb-0">Upload Blog Thumbnail Image: </label>
                    <input type="file" name="thumbnailImage" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Blog Headline: </label>
                    <input type="text" name="blogHeadline" class="form-control" placeholder="Enter blog headline">
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label mb-0">Enter Blog Detailed Content: </label>
                    <textarea type="text" name="blogDetailContent" rows="6" style="resize: none;" placeholder="Enter Blog Detailed Content...." class="form-control"></textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label mb-0">Select Publish Date: </label>
                    <input type="date" name="blogPublishDate" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('blogDetailContent');
</script>
@endpush
@endsection
