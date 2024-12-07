<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('User.LandingPage');
    }

    public function viewAppartments()
    {
        return view('User.Appartments');
    }

    public function viewBenefits()
    {
        return view('User.Benefits');
    }

    public function viewCorporate()
    {
        return view('User.Corporate');
    }

    public function viewAbout()
    {
        return view('User.About');
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

