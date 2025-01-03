<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function Dashboard()
    {
        // Total Inquiries | Total Bookings | Revenue | Available Apartments
        $totalInquiries = DB::table('inquiry')->count();
        $totalBookings = DB::table('booking')->count();
        $totalRevenue = DB::table('booking')->sum('total_amount');
        // Bookings Trends | Revenue Trends

        // Recent Inquiries | Upcoming Bookings
        return view('Admin.Dashboard')->with(compact(
            'totalInquiries',
            'totalBookings',
            'totalRevenue'
        ));
    }

    // Appartment Section
    public function Apartments()
    {
        $fetchAllApartments = DB::table('apartments')->get();
        return view('Admin.Apartments')->with(compact('fetchAllApartments'));
    }

    public function toggleFav($id)
    {
        $findApartment = DB::table('apartments')->find($id);

        if ($findApartment->isFavourite == 0) {
            DB::table('apartments')->where('id', $id)->update(['isFavourite' => 1]);
            toastr()->success('Selected apartment is added to favourite');

        } else {
            DB::table('apartments')->where('id', $id)->update(['isFavourite' => 0]);
            toastr()->success('Selected apartment is removed from favourite');
        }


        return redirect()->back();
    }
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

        // Form Validation
        $request->validate([
            'areaName' => 'required',
            'apartmentPrice' => 'required',
            'apartmentPricePerNight' => 'required',
            'streetAddress' => 'required',
            'apartmentMapLocation' => 'required',
            'totalBedrooms' => 'required|integer|min:1|max:6',
            'totalBathrooms' => 'required|integer|min:1|max:4',
            'apartmentAreaSqFt' => 'required',
            'latitudeVal' => 'required',
            'longitudeVal' => 'required',
            'apartmentDescription' => 'required',
            'availableFrom' => 'required',
            'availableTill' => 'required',
            'featuredImg' => 'required',
            'apartmentMultImages' => 'required',
            'cleanlinessVal' => 'required|integer|min:1|max:10',
            'comfortVal' => 'required|integer|min:1|max:10',
            'facilityVal' => 'required|integer|min:1|max:10',
            'locationVal' => 'required|integer|min:1|max:10',
            'staffVal' => 'required|integer|min:1|max:10',
            'valueForMoney' => 'required|integer|min:1|max:10',
            'internetQuality' => 'required|integer|min:1|max:10'
        ]);
        // Creating timestamp of featured image
        $featuredImgTimeStamp = time() . '.' . $request->featuredImg->getClientOriginalExtension();

        // Loop through multiple images
        $image = array();
        if ($files = $request->file('apartmentMultImages')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'Apartment/Images/';
                $image_url = $upload_path . $image_full_name;
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
            'free_wifi_val' => $request->internetQuality,
            'longitude' => $request->longitudeVal,
            'latitude' => $request->latitudeVal,
            'sqfeet_area' => $request->apartmentAreaSqFt,
            'created_at' => now()
        ]);

        if ($res) {
            toastr()->success('New apartment added successfully');
            return redirect()->back();
        }
    }

    public function deleteApartment($id)
    {
        $findApartment = DB::table('apartments')->where('id', '=', $id);
        if ($findApartment) {
            $result = $findApartment->delete();
            toastr()->success('Record deleted successfully');
            return redirect()->back();
        }
    }

    public function editApartment($id)
    {
        $findApartment = DB::table('apartments')->find($id);
        $images = explode('|', $findApartment->multipleImages);
        return view('Admin.EditApartment')->with(compact('findApartment', 'images'));
    }

    public function updateApartment($id, Request $request)
    {
        $findApartment = DB::table('apartments')->find($id);
        // Form Validation
        $request->validate([
            'areaName' => 'required',
            'apartmentPrice' => 'required',
            'apartmentPricePerNight' => 'required',
            'streetAddress' => 'required',
            'apartmentMapLocation' => 'required',
            'totalBedrooms' => 'required|integer|min:1|max:6',
            'totalBathrooms' => 'required|integer|min:1|max:4',
            'apartmentDescription' => 'required',
            'availableFrom' => 'required',
            'availableTill' => 'required',
            'cleanlinessVal' => 'required|integer|min:1|max:10',
            'comfortVal' => 'required|integer|min:1|max:10',
            'facilityVal' => 'required|integer|min:1|max:10',
            'locationVal' => 'required|integer|min:1|max:10',
            'staffVal' => 'required|integer|min:1|max:10',
            'valueForMoney' => 'required|integer|min:1|max:10',
            'internetQuality' => 'required|integer|min:1|max:10'
        ]);


        // Loop through multiple images
        $image = array();
        if ($files = $request->file('apartmentMultImages')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'Apartment/Images/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        } else {
            $image = explode("|", $findApartment->multipleImages);
        }

        if ($request->file('featuredImg')) {
            // Creating timestamp of featured image
            $featuredImgTimeStamp = time() . '.' . $request->featuredImg->getClientOriginalExtension();

            // Store featured image to public folder
            $request->featuredImg->move('Apartment/Thubmbnail', $featuredImgTimeStamp);
        } else {
            $featuredImgTimeStamp = $findApartment->featuredImage;
        }

        $res = DB::table('apartments')->where('id', '=', $id)->update([
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
            'free_wifi_val' => $request->internetQuality,
            'longitude' => $request->longitudeVal,
            'latitude' => $request->latitudeVal,
        ]);

        if ($res) {
            toastr()->success('Apartment record updated successfully');
            return redirect()->back();
        }
    }
    // Fav Appartment Section
    public function favouriteApartments()
    {
        $fetchFavApartment = DB::table('apartments')->where('isFavourite', '=', 1)->get();
        return view('Admin.FavouriteApartment')->with(compact('fetchFavApartment'));
    }


    public function Benefits()
    {
        $fetchBenefits = DB::table('amenity')->get();
        return view('Admin.Benefits')->with(compact('fetchBenefits'));
    }

    public function AddBenefit()
    {
        return view('Admin.AddBenefits');
    }



    public function createBenefit(Request $request)
    {
        // Form Validation
        $request->validate([
            'icon' => 'required|image',
            'amenityName' => 'required',
            'amenityDescription' => 'required'
        ]);
        $timeStampImg = time() . '.' . $request->icon->getClientOriginalExtension();

        $request->icon->move('Amenity', $timeStampImg);

        $result = DB::table('amenity')->insert([
            'amenity_icon' => $timeStampImg,
            'amenity_text' => $request->amenityName,
            'amenity_description' => $request->amenityDescription,
            'created_at' => now()
        ]);

        if ($result) {
            toastr()->success('Amenity added successfully');
            return redirect()->back();
        }
    }

    public function editBenefit($id)
    {
        $fetchBenefit = DB::table('amenities')->find($id);
        return view('Admin.EditBenefit')->with(compact('fetchBenefit'));
    }


    public function updateBenefit($id, Request $request)
    {
        $iconImg = DB::table('amenity')->
            where('id', '=', $id)
            ->select('amenity_icon')
            ->get();

        if ($request->file('icon')) {
            $timeStampImg = time() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move('amenities', $timeStampImg);
        } else {
            $timeStampImg = $iconImg;
        }


        $result = DB::table('amenity')
            ->where('id', '=', $id)
            ->update([
                'amenity_icon' => $timeStampImg,
                'amenity_text' => $request->amenityName,
                'amenity_description' => $request->amenityDescription,
                'updated_at' => now()
            ]);

        if ($result) {
            toastr()->success('Amenity updated successfully');
            return redirect()->back();
        }
    }

    public function deleteBenefit($id)
    {
        $res = DB::table('amenity')->where('id', '=', $id)->delete();

        if ($res) {
            toastr()->success('Record removed successfully');
            return redirect()->back();
        }
    }


    // Blog
    public function Blog()
    {
        $fetchAllBlogs = DB::table('blogs')->get();
        return view('Admin.Blog')->with(compact('fetchAllBlogs'));
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
            'blogDetailContent' => 'required',
            'blogPublishDate' => 'required'
        ]);

        $timeStampImg = time() . '.' . $request->thumbnailImage->getClientOriginalExtension();

        // Store image to public folder
        $request->thumbnailImage->move('Blog', $timeStampImg);
        $result = DB::table('blogs')->insert([
            'thumbnail_image' => $timeStampImg,
            'blog_headline' => $request->blogHeadline,
            'blog_content' => $request->blogDetailContent,
            'publish_date' => $request->blogPublishDate,
            'created_at' => now()
        ]);

        if ($result) {
            toastr()->success('New blog published successfully');
            return redirect()->back();
        }
    }

    public function editBlog($id)
    {
        $findBlog = DB::table('blogs')->find($id);
        return view('Admin.EditBlog')->with(compact('findBlog'));
    }

    public function updateBlog($id, Request $request)
    {
        // Create image timestamp path
        if ($request->file('thumbnailImage')) {
            $timestampImg = time() . '.' . $request->thumbnailImage->getClientOriginalExtenstion();
            $request->thumbnailImage->move('Blog', $timestampImg);
        } else {
            $blog = DB::table('Blogs')->find($id);
            $timestampImg = $blog->thumbnail_image;
        }
        $isUpdated = DB::table('Blogs')
            ->where('id', '=', $id)
            ->update([
                'thumbnail_image' => $timestampImg,
                'publish_date' => $request->blogPublishDate,
                'blog_headline' => $request->blogHeadline,
                'blog_content' => $request->blogDetailContent
            ]);

            if ($isUpdated){
                toastr()->success('Blog deleted successfully');
                return redirect()->back();
            }
    }

    public function deleteBlog($id){
        $isDeleted = DB::table('Blogs')->where('id','=', $id)->delete();
        if ($isDeleted){
            toastr()->success('Blog deleted successfully');
            return redirect()->back();
        }
    }

    public function Policy()
    {
        $fetchAllPolicies = DB::table('policy')->get();
        return view('Admin.Policy')->with(compact('fetchAllPolicies'));
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
            'policy_name' => $request->policyName,
            'created_at' => now()
        ]);

        if ($res) {
            toastr()->success('Policy Information Added Successfully');
            return redirect()->back();
        }
    }

    public function editPolicy($id)
    {
        $findPolicy = DB::table('Policy')->find($id);
        return view('Admin.EditPolicy')->with(compact('findPolicy'));
    }

    public function updatePolicy($id, Request $request)
    {

        // Store Policy Icon to Public folder
        if ($request->file('icon')) {
            $timeStmpImg = time() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move('Policy/Icons', $timeStmpImg);
        } else {
            $timeStmpImg = DB::table('policy')->where('id', '=', $id)->value('policy_icon');
        }


        $result = DB::table('Policy')
            ->where('id', '=', $id)
            ->update([
                'policy_icon' => $timeStmpImg,
                'policy_name' => $request->policyName,
                'updated_at' => now()
            ]);

        if ($result) {
            toastr()->success('Policy record updated successfully');
            return redirect()->back();
        }
    }

    public function deletePolicy($id)
    {
        $isDeleted = DB::table('Policy')->where('id', '=', $id)->delete();

        if ($isDeleted) {
            toastr()->success('Policy record removed successfully');
            return redirect()->back();
        }
    }

    // Booking
    public function Booking()
    {
        $fetchBookingRecords = DB::table('booking')->get();
        return view('Admin.Booking')->with(compact('fetchBookingRecords'));
    }

    public function generatePDF($id)
    {
        $fetchRecord = DB::table('booking')->find($id);
        $fetchApartmentID = $fetchRecord->apartment_id;
        $fetchBookingRecord = DB::table('booking')
            ->join('apartments', 'booking.apartment_id', '=', 'apartments.id')
            ->select('booking.*', 'apartments.*')
            ->where('booking.apartment_id', $fetchApartmentID)
            ->first();


        // Logo Image Path
        $imgPath = public_path('images/company_logo.png');
        $fileName = "{$fetchRecord->first_name}_Booking_{$fetchRecord->id}.pdf";
        $pdfRecord = Pdf::loadView('Admin.CustomerRecord', compact('fetchBookingRecord', 'fetchRecord', 'imgPath'));
        return $pdfRecord->download($fileName);
    }

    public function readInquiries()
    {
        $fetchQueries = DB::table('inquiry')->get();
        return view('Admin.CustomerQueries')->with(compact('fetchQueries'));
    }
}
