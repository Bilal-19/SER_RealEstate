@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/thankyou.png');
            background-size: cover;
        }

        .style-container{
            height: 488px;
            width: 713px;
            background-color: #ffffff;
            border-radius: 16px;
        }
    </style>
@endpush

@push('CTA')
<div class="row shadow">
    <div class="col-md-8 mx-auto style-container"></div>
</div>
@endpush
@section('user-main-section')

@endsection
