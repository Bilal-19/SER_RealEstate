<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Real Estate</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Link Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Link Google Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Swiper JS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('style')

    @stack('scripts')
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-between align-items-center pt-1 pb-1" id="top-header">
            <div class="col-md-3 d-flex justify-content-between align-items-center">
                <a href="" class="ff-inter">+44 7921919426</a>
                <a href="" class="ff-inter">zain.rav@gmail.com</a>
            </div>
            <div class="col-md-2 d-flex justify-content-around align-items-center">
                <a href="" class="ff-inter">Follow</a>
                <a href="https://www.instagram.com/sterlingexecutive/profilecard/?igsh=MXR3NDNicml4enc4cQ=="
                    target="_blank" class="mx-2">
                    <img src="{{ asset('assets/images/instagramIcon.png') }}" alt="">
                </a>
                <span>|</span>
                <a href="#" class="mx-2" target="_blank">
                    <img src="{{ asset('assets/images/tiktokIcon.png') }}" alt="">
                </a>
                <span>|</span>
                <a href="https://www.facebook.com/profile.php?id=61569866642277" class="mx-2" target="_blank">
                    <img src="{{ asset('assets/images/fbIcon.png') }}" alt="">
                </a>
            </div>
        </div>
        <div class="row banner-img">
            <nav class="navbar navbar-expand-lg mb-5 bg-light shadow">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('Landing.Page') }}">
                        {{-- <img src="{{ asset('assets/images/company_logo.png') }}" alt=""> --}}
                        STERLING EXECUTIVE RESIDENTIAL
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            {{-- <li class="nav-item">
                                <a class="nav-link ff-inter" aria-current="page"
                                    href="{{ route('View.Appartments') }}">APPARTMENTS</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link ff-inter nav-link-transition"
                                    href="{{ route('View.Benefits') }}">BENEFITS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ff-inter nav-link-transition"
                                    href="{{ route('View.Corporate') }}">CORPORATE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ff-inter nav-link-transition"
                                    href="{{ route('View.About') }}">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ff-inter nav-link-transition"
                                    href="{{ route('View.Blogs') }}">BLOG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ff-inter nav-link-transition"
                                    href="{{ route('View.Enquiry.Form') }}">CONTACT US</a>
                            </li>
                        </ul>
                        <a href="" class="brand-btn">Book Now</a>
                    </div>
                </div>
            </nav>
            @stack('CTA')


        </div>
    </div>
