@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/home_banner.png');
            background-size: cover;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <p class="text-center ff-poppins">Blogs</p>
            <h2 class="text-center ff-poppins fs-56">
                Resources
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-5">
        @foreach ($fetchAllBlogs as $record)
            <div class="col-md-4 blog-card">
                <img src="{{ asset('Blog/' . $record->thumbnail_image) }}" alt="{{ $record->blog_headline }}" class="img-fluid rounded">
                <p class="ff-inter">{{ date('d M Y', strtotime($record->publish_date)) }}</p>
                <h5 class="ff-inter fs-18">{{ $record->blog_headline }}</h5>
                <a href="{{ route('Read.Blog', ['id' => $record->id]) }}" class="text-light-brown">Read More</a>
            </div>
        @endforeach
    </div>
@endsection
