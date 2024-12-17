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
