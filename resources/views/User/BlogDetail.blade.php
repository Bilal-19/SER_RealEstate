@extends('UserLayout.main')


@push('style')
    <style>
        .blog-content img {
            height: 90% !important;
            width: 90% !important;
            border-radius: 6px;
        }
    </style>
@endpush

@section('user-main-section')
    <div class="row mb-5">
        <div class="col-md-8 mx-auto">
            <p class="text-dark ff-poppins fw-600 text-center">Published
                {{ date('d M Y', strtotime($fetchBlog->publish_date)) }}
            </p>
            <h2 class="ff-poppins fs-48 text-center mb-3">{{ $fetchBlog->blog_headline }}</h2>
            <img src="{{ asset('Blog/' . $fetchBlog->thumbnail_image) }}" alt="" class="rounded img-fluid mb-3">
        </div>
        <div class="col-md-8 mx-auto ff-poppins blog-content">
            {!! $fetchBlog->blog_content !!}
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <h3>Latest blog posts</h3>
                    <p>
                        Stay updated with the latest news, tips, and insights from Sterling Executive Residential to enhance
                        your London
                        experience.
                    </p>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('View.Blogs') }}" class="btn btn-dark">View More</a>
                </div>
            </div>

            <div class="row">
                @foreach ($fetchBlogs as $record)
                    <div class="col-md-4 blog-card">
                        <img src="{{ asset('Blog/' . $record->thumbnail_image) }}" alt="" class="img-fluid rounded">
                        <p class="ff-poppins">{{ date('d M Y', strtotime($record->publish_date)) }}</p>
                        <h5 class="ff-poppins fs-18">{{ $record->blog_headline }}</h5>
                        <a href="{{ route('Read.Blog', ['id' => $record->id]) }}" class="text-light-brown">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
