@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/home_banner.png');
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            <h2 class="text-center ff-poppins fs-56">
                Blog
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mt-5 d-flex justify-content-around">
        @foreach ($fetchAllBlogs as $record)
            <div class="col-md-3 blog-card">
                <img src="{{ asset('Blog/' . $record->thumbnail_image) }}" alt="{{ $record->blog_headline }}" class="img-fluid rounded">
                <p class="ff-poppins">{{ date('d M Y', strtotime($record->publish_date)) }}</p>
                <h5 class="ff-poppins fs-18">{{ $record->blog_headline }}</h5>
                <a href="{{ route('Read.Blog', ['id' => $record->id]) }}" class="text-light-brown">Read More</a>
            </div>
        @endforeach
    </div>
@endsection
