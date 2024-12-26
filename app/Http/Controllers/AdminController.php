<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('Admin.Dashboard');
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
            // 'featuredImg' => 'required',
            // 'apartmentMultImages' => 'required',
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
        $fetchBenefits = DB::table('Benefits')->get();
        return view('Admin.Benefits')->with(compact('fetchBenefits'));
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

    public function editBenefit($id)
    {
        $fetchBenefit = DB::table('Benefits')->find($id);
        return view('Admin.EditBenefit')->with(compact('fetchBenefit'));
    }


    public function updateBenefit($id, Request $request)
    {
        $iconImg = DB::table('benefits')->
            where('id', '=', $id)
            ->select('benefit_icon')
            ->get();

        if ($request->file('icon')) {
            $timeStampImg = time() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move('Benefits', $timeStampImg);
        } else {
            $timeStampImg = $iconImg;
        }


        $result = DB::table('benefits')
            ->where('id', '=', $id)
            ->update([
                'benefit_icon' => $timeStampImg,
                'benefit_text' => $request->benefitName,
                'benefit_description' => $request->benefitDescription
            ]);

        if ($result) {
            toastr()->success('Benefit updated successfully');
            return redirect()->back();
        }
    }

    public function deleteBenefit($id)
    {
        $res = DB::table('Benefits')->where('id', '=', $id)->delete();

        if ($res) {
            toastr()->success('Record removed successfully');
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


    // Booking
    public function Booking()
    {
        $fetchBookingRecords = DB::table('booking')->get();
        return view('Admin.Booking')->with(compact('fetchBookingRecords'));
    }

    public function generatePDF($id)
    {
        $fetchRecord= DB::table('booking')->find($id);
        $fetchApartmentID = $fetchRecord->apartment_id;
        $fetchBookingRecord = DB::table('booking')
            ->join('apartments', 'booking.apartment_id', '=', 'apartments.id')
            ->select('booking.*', 'apartments.*')
            ->where('booking.apartment_id', $fetchApartmentID)
            ->first();


            $fileName = "{$fetchRecord->first_name}_Booking_{$fetchRecord->id}.pdf";
        $pdfRecord = Pdf::loadView('Admin.CustomerRecord', compact( 'fetchBookingRecord', 'fetchRecord'));
        return $pdfRecord->download($fileName);
    }
}
