<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentVoucher;
class UserController extends Controller
{
    // Send Payment email
    public function sendEmail($checkIn, $checkOut, $location, $senderEmail, $perNightPrice, $vatAmount, $totalStay, $username, $areaname, $adults, $childrens)
    {
        // $recipientEmail = "bilal.zhtech@gmail.com";
        $message = "Welcome User";
        $subject = "Thanks {$username}, Your Booking at {$areaname} is Confirmed";

        return Mail::to($senderEmail)->send(
            new SendPaymentVoucher(
                $message,
                $subject,
                $checkIn,
                $checkOut,
                $location,
                $perNightPrice,
                $vatAmount,
                $totalStay,
                $username,
                $areaname,
                $adults,
                $childrens
            )
        );
    }
    public function index()
    {
        $topRatedApartment = DB::table('apartments')->where('isFavourite', '=', 1)->first();
        $fetchAllTestimonials = DB::table('feedback')->get();
        return view('User.LandingPage')->with(compact(
            'topRatedApartment',
            'fetchAllTestimonials'
        ));
    }

    public function viewAppartments()
    {
        return view('User.Appartments');
    }

    public function viewCorporate()
    {
        $fetchAllStandards = DB::table('standards')->get();
        return view('User.Corporate', with(compact("fetchAllStandards")));
    }

    public function aboutSterling()
    {
        return view('User.About');
    }

    public function JoinSterlingEnquiry()
    {
        return view("User.JoinSterling");
    }

    public function createCorporateInquiry(Request $request)
    {
        // Form Validation
        $request->validate(
            [
                'fullname' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'duration_of_stay' => 'required',
                'enquiry' => 'required'
            ]

        );
        $res = DB::table('corporate_inquiry')
            ->insert([
                'name' => $request->fullname,
                'email' => $request->email,
                'company_name' => $request->company_name ?? "Not Provided",
                'phone_number' => $request->phone_number,
                'duration_of_stay' => $request->duration_of_stay,
                'enquiry_message' => $request->enquiry,
                'created_at' => now()
            ]);

        if ($res) {
            toastr()->success("We've reveived your query. Our team will contact you soon");
            return redirect()->back();
        }
    }

    // View Available Apartments
    public function viewAvailableAparment(Request $request)
    {
        $location = $request->location;
        $availableApartments = DB::table('apartments')
            ->where('street_address', 'LIKE', "%$location%")
            ->orWhere('apartment_location', 'LIKE', "%$location%")
            ->whereDate('available_from', '<=', $request->checkInDate)
            ->whereDate('available_till', '>=', $request->checkOutDate)
            ->where('status', '=', 'Available')
            ->get();
        $locations = DB::table('apartments')->select('latitude', 'longitude')->get();


        if (count($availableApartments) > 1) {
            $latVal = $availableApartments->first()->latitude;
            $longVal = $availableApartments->first()->longitude;
        } else {
            $neighborhoodApartment = [];
        }

        return view('User.Appartments')->with(compact(
            'availableApartments',
            'locations'
        ));
    }



    public function viewApartmentDetail($id)
    {
        $findApartment = DB::table('apartments')->where('id', $id)->first();
        $fetchAllStandards = DB::table('standards')->get();
        $images = explode('|', $findApartment->multiple_images);
        return view('User.ViewApartmentDetail')->with(compact(
            'images',
            'findApartment',
            'fetchAllStandards'
        ));
    }

    public function checkApartmentAvailability(Request $request, $id)
    {
        $findApartment = DB::table('apartments')->where('id', $id)->first();
        $images = explode('|', $findApartment->multiple_images);
        $apartments = DB::table('apartments')->get();
        $fetchAllStandards = DB::table('standards')->get();

        $checkInDate = $request->checkIn;
        $checkOutDate = $request->checkOut;
        $bedrooms = $request->bedrooms;

        if ($findApartment->status == 'Booked') {
            $guestBooked = true;
        } else {
            $guestBooked = false;
        }
        $isAvailable = $findApartment->available_from <= $checkInDate && $findApartment->available_till >= $checkOutDate;
        return view('User.ViewApartmentDetail')->with(compact(
            'isAvailable',
            'images',
            'findApartment',
            'apartments',
            'checkInDate',
            'checkOutDate',
            'guestBooked',
            'fetchAllStandards',
            'bedrooms'
        ));

    }

    public function Booking($id, $checkIn, $checkOut, $bedrooms)
    {

        $checkIn = request('checkIn');
        $checkOut = request('checkOut');
        $bedrooms = request('bedrooms');

        $checkInDate = Carbon::createFromFormat('Y-m-d', $checkIn);
        $checkOutDate = Carbon::createFromFormat('Y-m-d', $checkOut);


        $stayDays = $checkInDate->diffInDays($checkOutDate);

        $findApartment = DB::table('apartments')->where('id', $id)->first();

        return view('User.Booking')->with(compact(
            'stayDays',
            'findApartment',
            'checkIn',
            'checkOut',
            'bedrooms'
        ));
    }

    // Confirm Booking
    public function stripePost(Request $request, $apartmentID, $checkIn, $checkOut, $totalDays, $totalAmount, $apartment_price)
    {
        // Check If the apartment is already booked or not
        $findApartmentStatus = DB::table('apartments')->where("id", "=", $apartmentID)->first();
        $isBooked = $findApartmentStatus->status;

        if ($isBooked == "Booked") {
            toastr()->info("This apartment is already booked.");
            return redirect()->back();
        }
        // Form Validation
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'message' => 'required'
        ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $totalAmount * 100,
            "currency" => "gbp",
            "source" => $request->stripeToken,
            "description" => "Amount deducted from your account"
        ]);

        //Booking Table Object
        $res = DB::table('booking')->insert([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'message' => $request->message,
            'payment_status' => "Completed",
            'is_agree_to_terms' => $request->isAgreeToTerms ?? "off",
            'is_agree_to_marketing' => $request->isAgreeToMarketing ?? "off",
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'total_days_to_stay' => $totalDays,
            'total_amount' => $totalAmount,
            'totalAdults' => $request->adults,
            'totalChildrens' => $request->childrens,
            'apartment_id' => $apartmentID,
            'created_at' => now()
        ]);

        // Update 'status' from 'available' to 'booked'
        DB::table('apartments')
            ->where('id', '=', $apartmentID)
            ->update([
                'status' => 'Booked'
            ]);

        $findApartment = DB::table('apartments')->find($apartmentID);
        $findApartment->status = "Booked";

        $isEmailSent = $this->sendEmail(
            $checkIn,
            $checkOut,
            $findApartment->street_address,
            $request->email,
            $apartment_price,
            2,
            $totalDays,
            $request->fname,
            $findApartment->apartment_name,
            $request->adults,
            $request->childrens,
        );

        if ($res && $isEmailSent) {
            toastr()->success("We've received your information. Our team will contact you soon");
            return view('User.Thankyou');
        }
    }
    // Thankyou page
    public function ThankYou()
    {
        return view('User.Thankyou');
    }
    // Neighbors

    public function SearchLocation()
    {
        return view('User.SearchLocation');
    }

    public function viewExperience()
    {
        $fetchAllStandards = DB::table('standards')->get();
        $fetchAllFAQs = DB::table('faq')->limit(4)->get();
        $fetchAllTestimonials = DB::table('feedback')->get();
        return view('User.Experience', with(compact("fetchAllStandards", "fetchAllFAQs", "fetchAllTestimonials")));
    }

    public function Locations()
    {
        $fetchAllLocations = DB::table('locations')->get();
        return view("User.Locations", with(compact("fetchAllLocations")));
    }

    public function LocationDetail($id)
    {
        $findLocation = DB::table('locations')->find($id);
        $locationName = $findLocation->location;

        // Filter Apartments
        $filterApartments = DB::table('apartments')->where('apartment_location', '=', $locationName)->get();

        $locations = DB::table("apartments")
            ->select(["apartment_name", "latitude", "longitude"])
            ->where("apartment_location", "=", $locationName)
            ->get();
        return view("User.LocationDetail", with(compact("filterApartments", "locationName", "locations")));
    }

    public function SubmitLocationEnquiry(Request $request)
    {
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "phone_number" => "required",
            "arrival_date" => "required",
            "departure_date" => "required",
            "enquiry" => "required"
        ]);

        $isEnquiryCreated = DB::table("location_inquiry")->insert([
            "full_name" => $request->fullname,
            "email" => $request->email,
            "company_name" => $request->company_name ?? "Not Provided",
            "phone_number" => $request->phone_number,
            "arrival_date" => $request->arrival_date,
            "departure_date" => $request->departure_date,
            "enquiry" => $request->enquiry,
            'created_at' => now()
        ]);

        if ($isEnquiryCreated) {
            toastr()->success("We have received your location enquiry. Our team will contact you soon.");
            return redirect()->back();
        } else {
            toastr()->info("Something went wrong. Please try again later.");
            return redirect()->back();
        }
    }

    // Create Inquiry - Join Sterling
    public function submitJoinSterlingInquiry(Request $request)
    {
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "phone_number" => "required",
            "enquiry" => "required"
        ]);

        $isEnquiryCreated = DB::table("join_sterling_inquiry")->insert([
            "full_name" => $request->fullname,
            "email" => $request->email,
            "company_name" => $request->company_name ?? "Not Provided",
            "phone_number" => $request->phone_number,
            "enquiry_message" => $request->enquiry,
            'created_at' => now()
        ]);

        if ($isEnquiryCreated) {
            toastr()->success("We've received your infomation. Our team will contact you soon.");
            return redirect()->back();
        } else {
            toastr()->info("Something went wrong. Please try again later.");
            return redirect()->back();
        }
    }

    // Contact Us Page
    public function ContactUs()
    {
        $fetchAllTestimonials = DB::table("feedback")->get();
        return view("User.ContactUs", with(compact("fetchAllTestimonials")));
    }

    // Booking Enquiry Page
    public function ViewBookingEnquiry()
    {
        return view("User.BookingEnquiry");
    }

    public function SubmitBookingEnquiry(Request $request)
    {
        // Form Validation
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "phone_number" => "required",
            "budget" => "required",
            "propertyType" => "required",
            "check_in" => "required",
            "check_out" => "required",
            "enquiry" => "required"
        ]);

        $isEnquiryCreated = DB::table("booking_inquiry")->insert([
            "company_name" => $request->company_name ?? "Not Provided",
            "full_name" => $request->fullname,
            "email_address" => $request->email,
            "phone_number" => $request->phone_number,
            "budget" => $request->budget,
            "property_size" => $request->propertyType,
            "check_in" => $request->check_in,
            "check_out" => $request->check_out,
            "enquiry_message" => $request->enquiry,
            'created_at' => now()
        ]);

        if ($isEnquiryCreated) {
            toastr()->success("We have received your booking enquiry. Our team will contact you soon.");
            return redirect()->back();
        } else {
            toastr()->info("Something went wrong. Please try again later.");
            return redirect()->back();
        }
    }

    public function generalEnquiry()
    {
        return view("User.GeneralEnquiry");
    }

    public function SubmitGeneralEnquiry(Request $request)
    {
        // Form Validation
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "phone_number" => "required",
            "enquiry" => "required"
        ]);

        $isEnquiryCreated = DB::table("general_inquiry")->insert([
            "company_name" => $request->company_name ?? "Not Provided",
            "full_name" => $request->fullname,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "enquiry" => $request->enquiry,
            'created_at' => now()
        ]);

        if ($isEnquiryCreated) {
            toastr()->success("We have received your general enquiry. Our team will contact you soon.");
            return redirect()->back();
        } else {
            toastr()->info("Something went wrong. Please try again later.");
            return redirect()->back();
        }
    }

    public function FAQs()
    {
        $fetchAllFAQs = DB::table("faq")->get();
        return view("User.FAQs", with(compact("fetchAllFAQs")));
    }

    public function propertyTypeHouse()
    {
        $fetchHouses = DB::table("apartments")
            ->where('status', '=', 'Available')
            ->where('apartment_type', '=', 'House')
            ->get();
        return view("User.PropertyTypeHouse", with(compact("fetchHouses")));
    }

    public function propertyTypeApartment()
    {
        $fetchApartments = DB::table("apartments")
            ->where('status', '=', 'Available')
            ->where('apartment_type', '=', 'Apartment')
            ->get();
        return view("User.PropertyTypeApartment", with(compact("fetchApartments")));
    }

    public function propertyTypeRooms()
    {
        $fetchRooms = DB::table("apartments")
            ->where('status', '=', 'Available')
            ->where('apartment_type', '=', 'Rooms')
            ->get();
        return view("User.PropertyTypeRooms", with(compact("fetchRooms")));
    }

}

