@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Edit Blog</h3>
        </div>

        <div class="row">
            <form action="{{ route('Update.Blog', ['id' => $findBlog->id]) }}" method="post" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <p class="ff-inter mb-0">Blog Thumbnail Image:</p>
                    <img src="{{ asset('Blog/' . $findBlog->thumbnail_image) }}" alt="" class="img-fluid rounded"
                        style="height: 300px; width: 300px; object-fit:cover;">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Upload Blog Thumbnail Image (Optional): </label>
                    <input type="file" name="thumbnailImage" class="form-control">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <label class="form-label mb-0">Enter Blog Headline: </label>
                    <input type="text" name="blogHeadline" class="form-control" placeholder="Enter blog headline"
                        value="{{ $findBlog->blog_headline }}">
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label mb-0">Enter Blog Detailed Content: </label>
                    <textarea type="text" name="blogDetailContent" rows="6" style="resize: none;"
                        placeholder="Enter Blog Detailed Content...." class="form-control">{{ $findBlog->blog_content }}</textarea>
                </div>

                <div class="col-md-6 mx-auto mt-3 mb-0">
                    <label class="form-label mb-0">Select Publish Date: </label>
                    <input type="date" name="blogPublishDate" class="form-control" value="{{ $findBlog->publish_date }}">
                </div>

                <div class="col-md-6 mx-auto mt-3">
                    <button class="brand-btn">Update</button>
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
