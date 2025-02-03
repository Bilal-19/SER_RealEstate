@stack('footer-cta')
<div class="container-fluid text-light pb-2 " id="footer-color">
    <div class="row d-flex flex-md-row flex-sm-column justify-content-center align-items-around pt-5">

        <div class="col-md-2">
            <p class="">Company</p>
            <a href="{{ route('View.About') }}" class="text-light d-block ">About Sterling</a>
            <a href="{{route("view.Locations")}}" class="text-light d-block ">Locations</a>
            <a href="{{route("FAQs")}}" class="text-light d-block ">FAQs</a>
            <a href="{{ route("view.ContactUs") }}" class="text-light d-block ">Contact Us</a>
        </div>

        <div class="col-md-2">
            <p class="">Book</p>
            <a href="{{ route("Booking.Enquiry") }}" class="text-light d-block ">Make an Enquiry</a>
            <a href="/experience/#booking-faq" class="text-light d-block ">Booking FAQs</a>
        </div>
        <div class="col-md-3 d-flex flex-column">
            <p>Support</p>
            <a href="mailto:info@sterling-executive.com" class="text-light">info@sterling-executive.com</a>
            <a href="#" class="text-light ">Support FAQs</a>
        </div>
        <div class="col-md-4 d-flex flex-column">
            <a href="{{route('Landing.Page')}}" class="text-light" id="footer-link">
                <img src="{{ asset('assets/images/company_logo.png') }}" alt="Sterling Executive Residential Logo"
                    style="height: 60px; width: 60px;">
                STERLING EXECUTIVE RESIDENTIAL
            </a>

            <div class="mt-2">
                <a href="#">
                    <i class="fa-brands fa-linkedin fa-xl"></i>
                </a>
                <span>|</span>
                <a href="https://www.facebook.com/profile.php?id=61569866642277">
                    <i class="fa-brands fa-facebook fa-xl"></i>
                </a>
                <span>|</span>
                <a href="https://www.instagram.com/sterlingexecutive/profilecard/?igsh=MXR3NDNicml4enc4cQ==">
                    <i class="fa-brands fa-instagram fa-xl"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            <hr>
        </div>
    </div>

    <div class="row d-flex justify-content-around align-items-center">
        <div class="col-md-5">
            <p>&copy; Copyright 2024 Sterling Executive Residential. All rights reserved.</p>
        </div>
        <div class="col-md-2">
            {{-- <p>Developed by <a href="https://zhtechsolutions.com/" class="text-light" target="_blank">ZH Tech</a></p> --}}
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

{{-- Swiper JS Script --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="{{ asset('assets/js/swiperJS.js') }}"></script>

</body>

</html>
