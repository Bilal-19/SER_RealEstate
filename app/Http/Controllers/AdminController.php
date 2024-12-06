<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dashboard(){
        return view('Admin.Dashboard');
    }

    public function ViewCities(){
        return view('Admin.ViewCities');
    }

    public function addCity(){
        return view('Admin.AddNewCity');
    }

    public function viewAppartment(){
        return view('Admin.ViewAppartments');
    }

    public function addAppartment(){
        return view('Admin.AddAppartments');
    }
}
