<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\AdminController;
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
        $favApartmentRecords = DB::table('apartments')->where('isFavourite', '=', 1)->get();
        $benefitsRecords = DB::table('amenity')->get();
        $blogRecords = DB::table('blogs')->limit(3)->get();
        $fetchNearestApartment = $this->getNeighbours();
        return view('User.LandingPage')->with(compact(
            'favApartmentRecords',
            'benefitsRecords',
            'blogRecords',
            'fetchNearestApartment'
        ));
    }

    public function viewAppartments()
    {
        return view('User.Appartments');
    }

    public function viewBenefits()
    {
        $amenities = DB::table('amenity')->get();
        $policies = DB::table('policy')->get();
        return view('User.Benefits')->with(compact(
            'amenities',
            'policies'
        ));
    }

    public function viewCorporate()
    {
        $fetchNeighboursData = $this->getNeighbours();
        return view('User.Corporate')->with(compact('fetchNeighboursData'));
    }

    public function viewAbout()
    {
        $blogRecords = DB::table('blogs')->limit(3)->get();
        return view('User.About')->with(compact('blogRecords'));
    }

    public function viewBlogs()
    {
        $fetchAllBlogs = DB::table('Blogs')->get();
        return view("User.Blog")->with(compact('fetchAllBlogs'));
    }

    public function readBlog($id)
    {
        // Fetch first three blog
        $fetchBlogs = DB::table('blogs')->limit(3)->get();

        $fetchBlog = DB::table('blogs')->find($id);
        return view('User.BlogDetail')->with(compact('fetchBlog', 'fetchBlogs'));
    }

    public function viewEnquiryForm()
    {
        return view('User.Enquiry');
    }

    public function createInquiry(Request $request)
    {
        // Form Validation
        $request->validate(
            [
                'fullName' => 'required',
                'email' => 'required',
                'message' => 'required'
            ]

        );
        $res = DB::table('inquiry')
            ->insert([
                'name' => $request->fullName,
                'email' => $request->email,
                'message' => $request->message,
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
            ->orWhere('area_name', 'LIKE', "%$location%")
            ->whereDate('availableFrom', '<=', $request->checkInDate)
            ->whereDate('availableTill', '>=', $request->checkOutDate)
            ->where('status', '=', 'available')
            ->get();
        $locations = DB::table('apartments')->select('latitude', 'longitude')->get();


        if (count($availableApartments) > 1) {
            $latVal = $availableApartments->first()->latitude;
            $longVal = $availableApartments->first()->longitude;
            $neighborhoodApartment = $this->calculateNearestDistance($latVal, $longVal);
        } else {
            $neighborhoodApartment = [];
        }

        return view('User.Appartments')->with(compact(
            'availableApartments',
            'locations',
            'neighborhoodApartment'
        ));
    }



    public function viewApartmentDetail($id)
    {
        $firstFourAmenities = DB::table('amenity')->limit(4)->get();
        $LastFourAmenities = DB::table('amenity')->take(4)->skip(4)->get();
        $findApartment = DB::table('apartments')->where('id', $id)->first();
        $images = explode('|', $findApartment->multipleImages);
        $apartments = DB::table('apartments')->get();
        return view('User.ViewApartmentDetail')->with(compact(
            'images',
            'findApartment',
            'firstFourAmenities',
            'LastFourAmenities',
            'apartments'
        ));
    }

    public function checkApartmentAvailability(Request $request, $id)
    {
        $firstFourAmenities = DB::table('amenity')->limit(4)->get();
        $LastFourAmenities = DB::table('amenity')->take(4)->skip(4)->get();
        $findApartment = DB::table('apartments')->where('id', $id)->first();
        $images = explode('|', $findApartment->multipleImages);
        $apartments = DB::table('apartments')->get();

        $checkInDate = $request->checkIn;
        $checkOutDate = $request->checkOut;

        if ($findApartment->status == 'booked') {
            $guestBooked = true;
        } else {
            $guestBooked = false;
        }
        $isAvailable = $findApartment->availableFrom <= $checkInDate && $findApartment->availableTill >= $checkOutDate;
        return view('User.ViewApartmentDetail')->with(compact(
            'isAvailable',
            'images',
            'findApartment',
            'firstFourAmenities',
            'LastFourAmenities',
            'apartments',
            'checkInDate',
            'checkOutDate',
            'guestBooked'
        ));

    }

    public function Booking($id, $checkIn, $checkOut)
    {
        $checkIn = request('checkIn');
        $checkOut = request('checkOut');

        $checkInDate = Carbon::createFromFormat('Y-m-d', $checkIn);
        $checkOutDate = Carbon::createFromFormat('Y-m-d', $checkOut);


        $stayDays = $checkInDate->diffInDays($checkOutDate);

        $findApartment = DB::table('apartments')->where('id', $id)->first();

        return view('User.Booking')->with(compact('stayDays', 'findApartment', 'checkIn', 'checkOut'));
    }

    // Confirm Booking
    public function stripePost(Request $request, $apartmentID, $checkIn, $checkOut, $totalDays, $totalAmount)
    {
        // Form Validation
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'message' => 'required',
            'account_title' => 'required',
            'card_number' => 'required',
            'cvc' => 'required',
            'expMonth' => 'required',
            'expYear' => 'required'
        ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $totalAmount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Amount deducted from your account"
        ]);

        // // Booking Table Object
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
            'account_title' => $request->account_title,
            'card_number' => $request->card_number,
            'card_verification_code' => $request->cvc,
            'expiration_month' => $request->expMonth,
            'expiration_year' => $request->expYear,
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
            $findApartment->price_per_night,
            2,
            $totalDays,
            $request->fname,
            $findApartment->area_name,
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

    public function calculateNearestDistance($latitudeValue, $longitudeValue)
    {
        // $latitudeValue = '24.882311053274144';
        // $longitudeValue = '67.04475512231853';
        $nearestDistance = DB::table('apartments')
            ->select(
                '*',
                DB::raw(
                    "6371 * acos(cos(radians(" . $latitudeValue . "))
            * cos(radians(apartments.latitude))
            * cos(radians(apartments.longitude) - radians(" . $longitudeValue . ") )
            + sin(radians(" . $latitudeValue . "))
            * sin(radians(apartments.latitude))) AS Distance"
                )
            )
            ->orderBy('Distance')
            ->limit(8)
            ->get();

        return $nearestDistance;
    }
    // Neighbors
    public function getNeighbours()
    {
        // Find first apartment
        $firstApt = DB::table('apartments')->first();
        if ($firstApt) {
            $latitude = $firstApt->latitude;
            $longitude = $firstApt->longitude;

            $result = $this->calculateNearestDistance($latitude, $longitude);

            return $result;
        } else {
            toastr()->error('No record found');
        }

    }
}

