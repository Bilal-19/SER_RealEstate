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

    // Appartment Section
    public function viewAppartment()
    {
        return view('Admin.ViewAppartments');
    }

    public function addAppartment()
    {
        return view('Admin.AddAppartments');
    }

    public function createApartment(Request $request)
    {

        // Creating timestamp of featured image
        $featuredImgTimeStamp = time() . '.' . $request->featuredImg->getClientOriginalExtension();

        // Loop through multiple images
        $image = array();
        if($files = $request->file('apartmentMultImages')){
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'Apartment/Images/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }

        // Store featured image to public folder
        $request->featuredImg->move('Apartment/Thubmbnail', $featuredImgTimeStamp);
        $res = DB::table('apartments')->insert([
            'area_name' => $request->areaName,
            'price' => $request->apartmentPrice,
            'price_per_night' => $request->apartmentPricePerNight,
            'street_address' => $request->streetAddress,
            'map_location' => $request->apartmentMapLocation,
            'total_bedrooms' => $request->totalBedrooms,
            'total_bathrooms' => $request->totalBathrooms,
            'description' => $request->apartmentDescription,
            'availableFrom' => $request->availableFrom,
            'availableTill' => $request->availableTill,
            'featuredImage' => $featuredImgTimeStamp,
            'multipleImages' => implode('|', $image),
            'cleanlinessVal' => $request->cleanlinessVal,
            'comfortVal' => $request->comfortVal,
            'facilitiesVal' => $request->facilityVal,
            'locationVal' => $request->locationVal,
            'staffVal' => $request->staffVal,
            'value_for_money' => $request->valueForMoney,
            'free_wifi_val' => $request->internetQuality
        ]);

        if ($res) {
            toastr()->success('New apartment added successfully');
            return redirect()->back();
        }
    }

    // Fav Appartment Section
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

    public function Benefits()
    {
        return view('Admin.Benefits');
    }

    public function AddBenefit()
    {
        return view('Admin.AddBenefits');
    }

    public function createBenefit(Request $request)
    {
        $timeStampImg = time() . '.' . $request->icon->getClientOriginalExtension();

        $request->icon->move('Benefits', $timeStampImg);

        $result = DB::table('benefits')->insert([
            'benefit_icon' => $timeStampImg,
            'benefit_text' => $request->benefitName,
            'benefit_description' => $request->benefitDescription
        ]);

        if ($result) {
            toastr()->success('Benefit added successfully');
            return redirect()->back();
        }
    }

    // Blog
    public function Blog()
    {
        return view('Admin.Blog');
    }

    public function AddBlog()
    {
        return view('Admin.AddBlog');
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'thumbnailImage' => 'required',
            'blogHeadline' => 'required',
            'blogBriefDesc' => 'required',
            'blogDetailContent' => 'required',
            'blogPublishDate' => 'required'
        ]);

        $timeStampImg = time() . '.' . $request->thumbnailImage->getClientOriginalExtension();

        // Store image to public folder
        $request->thumbnailImage->move('Blog', $timeStampImg);
        $result = DB::table('blogs')->insert([
            'thumbnail_image' => $timeStampImg,
            'blog_headline' => $request->blogHeadline,
            'blog_brief_description' => $request->blogBriefDesc,
            'blog_detailed_content' => $request->blogDetailContent,
            'publish_date' => $request->blogPublishDate
        ]);

        if ($result) {
            toastr()->success('New blog published successfully');
            return redirect()->back();
        }
    }

    public function Policy()
    {
        return view('Admin.Policy');
    }

    public function AddPolicy()
    {
        return view('Admin.AddPolicy');
    }

    public function createPolicy(Request $request)
    {
        // Store Policy Icon to Public folder
        $timeStmpImg = time() . '.' . $request->icon->getClientOriginalExtension();

        $request->icon->move('Policy/Icons', $timeStmpImg);
        $res = DB::table('policy')->insert([
            'policy_icon' => $timeStmpImg,
            'policy_name' => $request->policyName
        ]);

        if ($res) {
            toastr()->success('Policy Information Added Successfully');
            return redirect()->back();
        }
    }
}
