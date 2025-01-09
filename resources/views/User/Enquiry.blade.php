@extends('UserLayout.main')

@push('style')
    <style>
        .banner-img {
            background-image: url('/assets/images/enquiryBanner.png');
            background-size: cover;
            background-attachment: fixed;
        }

        input {
            height: 76px;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input,
        textarea {
            width: 768px;
            padding: 24px;
            border-radius: 10px;
            border: 1px solid #6D6E76;
            font-family: "inter";
            color: #232536;
            display: block;
        }

        input:focus,
        textarea:focus {
            outline: none;
        }

        textarea {
            resize: none;
        }

        .submit-btn {
            height: 64px;
            width: 768px;
            border-radius: 8px;
            background-color: #191919;
            color: #FFFFFF;
            border: none;
            font-weight: 700;
            font-size: 24px;
            font-family: "poppins";
        }

        @media screen and (max-width: 768px) {

            input,
            textarea,
            .submit-btn {
                width: 300px;
                margin: auto;
            }
        }
    </style>
@endpush

@push('CTA')
    <div class="row mt-5">
        <div class="col-md-9 mx-auto text-light search-container">
            {{-- <p class="text-center ff-poppins" style="letter-spacing: 3px;">CONTACT US</p> --}}
            <h2 class="text-center ff-poppins fs-56">
                CONTACT US
            </h2>
        </div>
    </div>
@endpush

@section('user-main-section')
    <div class="row mx-auto mt-5">
        <form action="{{ route('Create.Inquiry') }}" method="POST">
            @csrf
            <div class="col-md-8 mb-3">
                <input type="text" name="fullName" placeholder="Full Name">
                <small class="text-danger">
                    @error('fullName')
                        {{ 'Please enter your full name' }}
                    @enderror
                </small>
            </div>

            <div class="col-md-8 mb-3">
                <input type="email" name="email" placeholder="Your Email">
                <small class="text-danger">
                    @error('email')
                        {{ 'Please enter your email' }}
                    @enderror
                </small>
            </div>

            <div class="col-md-8 mb-3">
                <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                <small class="text-danger">
                    @error('message')
                        {{ 'Please enter your message' }}
                    @enderror
                </small>
            </div>

            <div class="col-md-8 mb-3">
                <button class="submit-btn">Send Message</button>
            </div>
        </form>
    </div>
@endsection
