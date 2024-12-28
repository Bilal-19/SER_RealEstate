@extends('UserLayout.main')


@push('style')
    <style>
        .blog-content > img{
            height: auto;
            width: 500px;
        }

    </style>
@endpush

@section('user-main-section')
    <div class="row mb-5">
        <div class="col-md-8 mx-auto">
            <p class="text-light-brown ff-inter fw-600 text-center">Published
                {{ date('d M Y', strtotime($fetchBlog->publish_date)) }}
            </p>
            <h2 class="ff-poppins fs-48 text-center mb-3">{{ $fetchBlog->blog_headline }}</h2>
            <img src="{{ asset('Blog/' . $fetchBlog->thumbnail_image) }}" alt="" class="rounded img-fluid mb-3">
        </div>
        <div class="col-md-8 mx-auto ff-inter blog-content">
            {!! $fetchBlog->blog_content !!}
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <h3>Latest blog posts</h3>
                    <p>
                        Stay updated with the latest news, tips, and insights from Sterling Executive Residential to enhance your London
                        experience.
                    </p>
                </div>
                <div class="col-md-3">
                    <a href="{{route('View.Blogs')}}" class="btn btn-dark">View More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
