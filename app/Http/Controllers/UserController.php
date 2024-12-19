<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $favApartmentRecords = DB::table('favourite_apartment')->get();
        $benefitsRecords = DB::table('benefits')->get();
        $blogRecords = DB::table('blogs')->limit(3)->get();
        return view('User.LandingPage')->with(compact(
            'favApartmentRecords',
            'benefitsRecords',
            'blogRecords'
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
}

