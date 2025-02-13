<div class="container-fluid text-light pb-2 mt-100 mt-sm-75" id="footer-color">
    <div class="row d-flex flex-md-row flex-sm-column justify-content-center align-items-around pt-5 mb-5">
        <div class="col-md-2">
            <p style="font-weight: 600">Company</p>
            <a href="{{ route('View.About') }}" class="text-light d-block">About Sterling</a>
            <a href="{{route("view.Locations")}}" class="text-light d-block">Locations</a>
            <a href="{{route("FAQs")}}" class="text-light d-block ">FAQs</a>
            <a href="{{ route("view.ContactUs") }}" class="text-light d-block">Contact Us</a>
        </div>

        <div class="col-md-2 mt-sm-25">
            <p style="font-weight: 600">Book</p>
            <a href="{{ route("Booking.Enquiry") }}" class="text-light d-block">Make an Enquiry</a>
            <a href="/experience/#booking-faq" class="text-light d-block">Booking FAQs</a>
        </div>
        <div class="col-md-3 d-flex flex-column mt-sm-25">
            <p style="font-weight: 600">Support</p>
            <a href="mailto:info@sterling-executive.com" class="text-light">info@sterling-executive.com</a>
        </div>
        <div class="col-md-4 d-flex flex-column align-items-end mt-sm-30">
            <a class="navbar-brand" href="{{ route('Landing.Page') }}">
                <img src="{{ asset('assets/images/ser_footer_logo.webp') }}" alt="Sterling Executive Residential Logo">
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
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="{{ asset('assets/js/swiperJS.js') }}"></script>

@stack('script')

</body>

</html>
