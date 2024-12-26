@stack('footer-cta')
<div class="container-fluid text-light pb-2 " id="footer-color">
    <div class="row d-flex flex-md-row flex-sm-column justify-content-center align-items-around pt-5">
        <div class="col-md-4">
            <h5 class="ff-poppins">
                <img src="{{asset('assets/images/company_logo.png')}}" alt="" style="height: 80px; width: 80px;">
                STERLING EXECUTIVE RESIDENTIAL
            </h5>
            <p class="ff-inter">Design amazing digital experiences that create more happy in the world.</p>
        </div>
        <div class="col-md-2">
            <p class="ff-inter">Sitemap</p>
            <a href="{{route('Landing.Page')}}" class="text-light d-block ff-inter">Home</a>
            <a href="{{route('View.About')}}" class="text-light d-block ff-inter">About Us</a>
            <a href="{{route('View.Corporate')}}" class="text-light d-block ff-inter">Corporate</a>
            <a href="{{route('View.Benefits')}}" class="text-light d-block ff-inter">Benefits</a>
            <a href="{{route('View.Enquiry.Form')}}" class="text-light d-block ff-inter">Contact Us</a>
            {{-- <a href="{{route('View.Blogs')}}" class="text-light d-block ff-inter">Blogs</a> --}}
        </div>
        <div class="col-md-3">
            <p>Contact Us</p>
            <a href="" class="text-light d-block">+44 7921919426</a>
            <a href="" class="text-light d-block">zain.rav@gmail.com</a>
        </div>
        <div class="col-md-2">
            <p>Follow us</p>
            <a href="https://www.instagram.com/sterlingexecutive/profilecard/?igsh=MXR3NDNicml4enc4cQ==">
                <i class="fa-brands fa-instagram fa-xl"></i>
            </a>
            <span>|</span>
            <a href="">
                <i class="fa-brands fa-tiktok fa-xl"></i>
            </a>
            <span>|</span>
            <a href="https://www.facebook.com/profile.php?id=61569866642277">
                <img src="{{ asset('assets/images/fbIcon.png') }}" alt="">
            </a>
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
