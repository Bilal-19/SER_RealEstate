@extends('UserLayout.main')


@section('user-main-section')
    <div class="row mx-auto d-flex flex-row mt-3 mb-3 justify-content-around align-items-center bg-light">
        <div class="col-md-4">
            <img src="{{ asset('assets/images/favourites_4.webp') }}" alt="" class="img-fluid mt-2 mb-2 rounded">
        </div>
        <div class="col-md-4">
            <h5>St Lukes</h5>
            <p>Bastwick Street, Islington, London, EC1V 399, UK</p>
            <p>Sterling Executive Residential are spacious with a superb value for the money as rates are up to 30% less
                than a comparable hotel room and offer a giant increase in space. Our booking transactions are secure and
                trusted.
            </p>
            <hr>
            <div class="d-flex justify-content-between">
                <a href="" class="btn btn-dark">VIEW APPARTMENT</a>
                <button class="btn btn-light border border-secondary">8</button>
            </div>
        </div>
    </div>
@endsection
