<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="hPCXHOPxwHuxZNC5xTD5nvDbnJPAhtGwynDqjBXO9fU" />
    <meta name="description" content="Book large family homes or studio apartments in London. Enjoy fully equipped properties and tailored stays for teams. Perfect for corporate or family stays!">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sterling Executive Residential</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Link Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Multiple Location Marker --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    @stack('style')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @stack('canonical-tag')

    <style>
        .user-active-link {
            text-decoration: underline;
            color: #c0c0c0;
            font-weight: 600;
        }

        #book-now-btn {
            background-color: #c0c0c0;
            color: #303030;
            padding: 6px 8px;
            border-radius: 6px;
            width: 200px;
            font-weight: 200;
        }

        .navbar-brand img{
            height: 95px;
        }




        @media screen and (max-width: 768px) {
            .navbar-brand img {
                height: 95px;
                width: 291px;
            }

            .mt-sm-25 {
                margin-top: 25px;
            }

            .mt-sm-30 {
                margin-top: 30px;
            }

            .mb-sm-150 {
                margin-bottom: 150px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('Landing.Page') }}">
                        <img src={{ asset('assets/images/ser_header_logo.webp') }} class="d-inline-block align-top" alt="sterling-executive-logo">
                    </a>
                    <button class="navbar-toggler bg-light ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-3">
                                <a class="nav-link {{ request()->routeIs('view.Experience') ? 'user-active-link' : '' }}" href="{{ route('view.Experience') }}">The Experience</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link {{ request()->routeIs('View.Corporate') ? 'user-active-link' : '' }}" href="{{ route('View.Corporate') }}">Corporate</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link {{ request()->routeIs('View.Enquiry.Form') ? 'user-active-link' : '' }}" href="{{ route('View.Enquiry.Form') }}">Join Sterling</a>
                            </li>
                        </ul>
                        <a href="{{ route('Book.Now') }}" id="book-now-btn"><i class="fa fa-search mx-2"></i> Search a location</a>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    @stack('CTA')
