<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('Admin.Dashboard');
    }

    public function ViewCities()
    {
        $AllCities = Cities::all();
        return view('Admin.ViewCities')->with(compact('AllCities'));
    }

    public function addCity()
    {
        return view('Admin.AddNewCity');
    }

    public function createCityRecord(Request $request)
    {
        $request->validate([
            'cityImage' => 'required',
            'cityName' => 'required',
            'countryName' => 'required',
        ]);

        //
        $cityTimestampImg = time() . '.' . $request->cityImage->getClientOriginalExtension();

        // Store Image to public folder
        $request->cityImage->move('City', $cityTimestampImg);

        $cityRecord = new Cities();
        $cityRecord->city_image = $cityTimestampImg;
        $cityRecord->city_name = $request['cityName'];
        $cityRecord->country_name = $request['countryName'];
        $res = $cityRecord->save();

        if ($res) {
            toastr()->success('New City Added Successfully');
            return redirect()->back();
        }

    }

    public function viewAppartment()
    {
        return view('Admin.ViewAppartments');
    }

    public function addAppartment()
    {
        return view('Admin.AddAppartments');
    }

    public function favouriteApartments()
    {
        return view('Admin.FavouriteApartment');
    }

    public function addFavouriteApartment()
    {
        return view('Admin.AddFavouriteApartment');
    }

    public function createFavouriteApartment(Request $request)
    {
        $timeStampFeaturedImg = time() . '.' . $request->featuredImg->getClientOriginalExtension();

        // Store Image to public folder
        $request->featuredImg->move('Apartment/Favourites', $timeStampFeaturedImg);

        $result = DB::table('favourite_apartment')->insert(
            [
                'featured_image' => $timeStampFeaturedImg,
                'apartment_name' => $request->apartmentName,
                'apartment_location' => $request->apartmentLocation,
                'apartment_price' => $request->apartmentPrice,
                'totalBedrooms' => $request->totalBedroom,
                'totalBathrooms' => $request->totalBathroom,
            ]
        );

        if ($result) {
            toastr()->success('New Favourite Apartment Added Successfully');
            return redirect()->back();
        }
    }
}
