@extends('UserLayout.main')


@section('user-main-section')
    <div class="row">
        <div class="col-md-12">
            <p class="fs-3 text-uppercase mt-5">Favourites:</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 favourite-card">
            <div class="card shadow">
                <img src="{{ asset('assets/images/favourites_1.webp') }}" alt="" class="img-fluid object-fit-cover">
                <h6 class="card-text p-2">FLEET STREET</h6>
                <div class="d-flex justify-content-between">
                    <p class="mb-0 px-2">City of London</p>
                    <p class="mb-0 px-2">from £259</p>
                </div>
                <p class="mt-0 px-2">2 bedroom</p>
            </div>
        </div>


        <div class="col-md-3 favourite-card">
            <div class="card shadow">
                <img src="{{ asset('assets/images/favourites_2.webp') }}" alt="" class="img-fluid object-fit-cover">
                <h6 class="card-text p-2">MOORFIELDS</h6>
                <div class="d-flex justify-content-between">
                    <p class="mb-0 px-2">Hackney</p>
                    <p class="mb-0 px-2">from £299</p>
                </div>
                <p class="mt-0 px-2">2 bedrooms</p>
            </div>
        </div>


        <div class="col-md-3 favourite-card">
            <div class="card shadow">
                <img src="{{ asset('assets/images/favourites_3.webp') }}" alt="" class="img-fluid object-fit-cover">
                <h6 class="card-text p-2">HOXTON</h6>
                <div class="d-flex justify-content-between">
                    <p class="mb-0 px-2">Hackney</p>
                    <p class="mb-0 px-2">from £199</p>
                </div>
                <p class="mt-0 px-2">1 & 2 bedrooms</p>
            </div>
        </div>

        <div class="col-md-3 favourite-card">
            <div class="card shadow">
                <img src="{{ asset('assets/images/favourites_4.webp') }}" alt="" class="img-fluid object-fit-cover">
                <h6 class="card-text p-2">BATHCOURT</h6>
                <div class="d-flex justify-content-between">
                    <p class="mb-0 px-2">Islington</p>
                    <p class="mb-0 px-2">from £299</p>
                </div>
                <p class="mt-0 px-2">1 bedroom</p>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9933.259719847401!2d-0.13748113914276847!3d51.507438004617406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604ce37bbdb95%3A0x5120415568fd2d8b!2sCentral%20London%2C%20London%20WC2N%205DU%2C%20UK!5e0!3m2!1sen!2s!4v1732259214866!5m2!1sen!2s"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="row mt-3">
        <p class="fs-3">THE NEIGHBOURHOODS:</p>
    </div>

    <div class="row">
        <div class="col-md-3 neighbourhood-card">
            <img src="{{ asset('assets/images/regents_park.webp') }}" alt=""
                class="img-fluid neighbourhood-img rounded shadow">
            <p class="fs-5 text-uppercase mb-0">Regent's Park</p>
            <p class="mt-0">Luxurious green spaces footsteps from Oxford Street</p>
        </div>

        <div class="col-md-3 neighbourhood-card">
            <img src="{{ asset('assets/images/shoreditch.webp') }}" alt=""
                class="img-fluid neighbourhood-img rounded shadow">
            <p class="fs-5 text-uppercase mb-0">Shoreditch</p>
            <p class="mt-0">Hipster central and full of edge</p>
        </div>

        <div class="col-md-3 neighbourhood-card">
            <img src="{{ asset('assets/images/barbican.webp') }}" alt=""
                class="img-fluid neighbourhood-img rounded shadow">
            <p class="fs-5 text-uppercase mb-0">Barbican</p>
            <p class="mt-0">Home to the Barbican Center of Performing Arts</p>
        </div>

        <div class="col-md-3 neighbourhood-card">
            <img src="{{ asset('assets/images/farringdon.webp') }}" alt=""
                class="img-fluid neighbourhood-img rounded shadow">
            <p class="fs-5 text-uppercase mb-0">Farringdon</p>
            <p class="mt-0">Footsteps away from the City of London</p>
        </div>
    </div>

    <div class="row mt-3">
        <p class="fs-3">THE BLOG:</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/blog_img_1.webp') }}" alt="" class="img-fluid blog-img">
            <p class="text-uppercase fs-5">Borough Market Party for the Bastille</p>
            <p class="col-md-11">A whole day of events - and then some... From wine testing to a food fair and
                small theatrical shows.
                The balloons were still there in the late evenings as well as the drinking crowd. The live music
                played loud and dancing carried on late.</p>
        </div>


        <div class="col-md-6">
            <img src="{{ asset('assets/images/blog_img_2.webp') }}" alt="" class="img-fluid blog-img">
            <p class="text-uppercase fs-5">Spitalfields Market: Grand Day for Shopping</p>
            <p class="col-md-11">
                Ever not wanted to have another boring day? Just add a little optimism, some ingenuity and there you
                have it - no longer stuck at home. Spitalfield's Market has lots of little pop up shops selling
                everything from used vinyl to hand crafted jewellery and vintage clothes.
            </p>
        </div>
    </div>
    </div>
@endsection
