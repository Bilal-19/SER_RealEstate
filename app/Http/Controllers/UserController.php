<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserController extends Controller
{
    public function index()
    {
        $favApartmentRecords = DB::table('favourite_apartment')->get();
        $benefitsRecords = DB::table('benefits')->get();
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
        $amenities = DB::table('benefits')->get();
        $policies = DB::table('policy')->get();
        return view('User.Benefits')->with(compact(
            'amenities',
            'policies'
        ));
    }

    public function viewCorporate()
    {
        return view('User.Corporate');
    }

    public function viewAbout()
    {
        $blogRecords = DB::table('blogs')->limit(3)->get();
        return view('User.About')->with(compact('blogRecords'));
    }

    public function viewBlogs()
    {
        return view("User.Blog");
    }

    public function viewEnquiryForm()
    {
        return view('User.Enquiry');
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
            ->get();

        return view('User.Appartments')->with(compact('availableApartments'));
    }



    public function viewApartmentDetail($id)
    {
        $firstFourAmenities = DB::table('benefits')->limit(4)->get();
        $LastFourAmenities = DB::table('benefits')->take(4)->skip(4)->get();
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
        $firstFourAmenities = DB::table('benefits')->limit(4)->get();
        $LastFourAmenities = DB::table('benefits')->take(4)->skip(4)->get();
        $findApartment = DB::table('apartments')->where('id', $id)->first();
        $images = explode('|', $findApartment->multipleImages);
        $apartments = DB::table('apartments')->get();

        $findApartment = DB::table('apartments')->find($id);

        $checkInDate = $request->checkIn;
        $checkOutDate = $request->checkOut;

        if ($findApartment->availableFrom <= $checkInDate && $findApartment->availableTill >= $checkOutDate) {
            $isAvailable = true;
            return view('User.ViewApartmentDetail')->with(compact(
                'isAvailable',
                'images',
                'findApartment',
                'firstFourAmenities',
                'LastFourAmenities',
                'apartments',
                'checkInDate',
                'checkOutDate'
            ));
        } else {
            $isAvailable = false;
            return view('User.ViewApartmentDetail')->with(compact(
                'isAvailable',
                'images',
                'findApartment',
                'firstFourAmenities',
                'LastFourAmenities',
                'apartments',
                'checkInDate',
                'checkOutDate'
            ));
        }
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
        if ($firstApt){
            $latitude = $firstApt->latitude;
            $longitude = $firstApt->longitude;

            $result = $this->calculateNearestDistance($latitude, $longitude);

            return $result;
        } else {
            toastr()->error('No record found');
        }

    }
}

