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
}

