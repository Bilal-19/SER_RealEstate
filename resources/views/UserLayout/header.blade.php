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
</head>

<body>
    <div class="container-fluid">
        <div class="row" id="home-hero-banner-img">
            <div class="col-md-1 d-flex flex-md-column flex-sm-row justify-content-md-around justify-content-sm-between align-items-center"
                style="background-color: rgba(0,0,0,0.7)">
                <a class="navbar-brand hide-img-md show-img-sm" href="{{ route('Landing.Page') }}">
                    <img src="{{ asset('assets/images/company_logo.jpg') }}" alt="company logo" class="img-fluid">
                </a>
                <a href="#"><i class="fa-brands fa-square-facebook fa-2x margin-sm-right-20"></i></a>
                <a href="#"><i class="fa-brands fa-twitter fa-2x margin-sm-right-20"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin fa-2x margin-sm-right-20"></i></a>
            </div>
            <div class="col-md-11">
                <nav class="navbar navbar-expand-lg mb-5">
                    <div class="container-fluid">

                        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-light" aria-current="page"
                                        href="{{ route('View.Appartments') }}">APPARTMENTS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('View.Benefits') }}">BENEFITS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('View.Corporate') }}">CORPORATE</a>
                                </li>
                            </ul>
                            <a class="navbar-brand hide-img-sm" href="{{ route('Landing.Page') }}">
                                <img src="{{ asset('assets/images/company_logo.jpg') }}" alt="company logo"
                                    class="img-fluid">
                            </a>
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('View.About') }}">ABOUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('View.Blogs') }}">BLOG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('View.Enquiry.Form') }}">ENQUIRY</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="row" id="mt-20">
                    <div class="col-md-10 mx-auto text-light search-container">
                        <p class="fs-5 text-center text-uppercase pt-5 px-5">Serviced Corporate Appartments</p>
                        <form action="" id="form-elements">
                            <input type="text" class="mx-2" placeholder="SEARCH BY AREA" required>
                            <input type="date" placeholder="CHECK IN" class="mx-2" required>
                            <input type="date" placeholder="CHECK OUT" class="mx-2" required>
                            <button id="search-btn" type="submit">SEARCH</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
