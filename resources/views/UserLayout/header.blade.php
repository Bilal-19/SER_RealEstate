<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Discover luxury living with Sterling Executive Residential. Explore our exclusive range of apartments across the UK, designed for comfort and convenience. Easily find your ideal stay by selecting your desired location, check-in, and check-out dates to view available options. Experience exceptional accommodations tailored to meet your needs, whether for business or leisure. Book your perfect apartment today and enjoy unparalleled service, prime locations, and modern amenities. Sterling Executive Residential redefining apartment living in the UK.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sterling Executive Residential</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Link Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- Link Google Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Swiper JS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Multiple Location Marker --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    @stack('style')

    @stack('scripts')
</head>

<body>
    <div class="container-fluid">
        <div class="row banner-img">
            <nav class="navbar navbar-expand-lg mb-5 bg-white shadow">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('Landing.Page') }}">
                        <img src="{{ asset('assets/images/ser_header_logo.png') }}" alt="Sterling Executive Residential Logo">
                        STERLING EXECUTIVE RESIDENTIAL
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link nav-link-transition {{ request()->routeIs('view.Experience') ? 'user-active-link' : '' }}"
                                    href="{{route("view.Experience")}}">The Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-transition {{ request()->routeIs('View.Corporate') ? 'user-active-link' : '' }}"
                                    href="{{ route('View.Corporate') }}">Corporate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-transition {{ request()->routeIs('View.Enquiry.Form') ? 'user-active-link' : '' }}"
                                    href="{{ route('View.Enquiry.Form') }}">Join Sterling</a>
                            </li>
                        </ul>
                        <a href="{{ route('Book.Now') }}" id="book-now-btn"><i class="fas fa-search"></i> Search a Location</a>
                    </div>
                </div>
            </nav>
            @stack('CTA')


        </div>
    </div>
