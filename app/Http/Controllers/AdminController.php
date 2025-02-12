<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    public function Dashboard()
    {
        if (Auth::check()) {
            $totalCorporateEnquiries = DB::table('corporate_inquiry')->count();
            $totalBookingEnquiries = DB::table('booking_inquiry')->count();
            $totalGeneralEnquiries = DB::table('general_inquiry')->count();
            $totalPartnershipEnquiries = DB::table('join_sterling_inquiry')->count();

            $totalBookings = DB::table('booking')->count();
            $totalRevenue = DB::table('booking')->sum('total_amount');

            $totalApartments = DB::table('apartments')->count();
            $totalAvailableApartments = DB::table('apartments')->where("status","=","available")->count();
            $totalBookedApartments = DB::table('apartments')->where("status","=","Booked")->count();
            return view('Admin.Dashboard')->with(compact(
                'totalCorporateEnquiries',
                "totalBookingEnquiries",
                "totalGeneralEnquiries",
                "totalPartnershipEnquiries",
                'totalBookings',
                'totalRevenue',
                'totalApartments',
                "totalAvailableApartments",
                "totalBookedApartments"
            ));
        } else {
            return view('auth.login');
        }
    }

    // Appartment Section
    public function Apartments(Request $request)
    {
        $search = $request->search ?? null;

        if ($search !== null) {
            $fetchAllApartments = DB::table('apartments')
                ->where('apartment_name', 'LIKE', "%$search%")
                ->orWhere('street_address', 'LIKE', "%$search%")
                ->get();
            return view('Admin.Apartments')->with(compact('fetchAllApartments'));
        } else {
            $fetchAllApartments = DB::table('apartments')->get();
            return view('Admin.Apartments')->with(compact('fetchAllApartments'));
        }
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
        $fetchLocArr = DB::table("locations")->pluck('location');
        return view('Admin.AddAppartments', with(compact("fetchLocArr")));
    }

    public function createApartment(Request $request)
    {

        // Form Validation
        $request->validate([
            "apartment_name" => "required",
            "apartment_location" => "required",
            "street_address" => "required",
            "one_bed_price" => "required",
            "two_bed_price" => "required",
            "apartment_map_location" => "required",
            "sq_feet_area" => "required",
            "apartment_description" => "required",
            "neighbourhood_description" => "required",
            "apartment_type" => "required",
            'available_from' => 'required',
            'available_till' => 'required',
            'featured_img' => 'required',
            'apartment_multi_images' => 'required',
        ]);
        // Creating timestamp of featured image
        $featuredImgTimeStamp = time() . '.' . $request->featured_img->getClientOriginalExtension();

        // Loop through multiple images
        $image = array();
        if ($files = $request->file('apartment_multi_images')) {
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
        $request->featured_img->move('Apartment/Thubmbnail', $featuredImgTimeStamp);
        $res = DB::table('apartments')->insert([
            "apartment_name" => $request->apartment_name,
            "apartment_location" => $request->apartment_location,
            "one_bedroom_price" => $request->one_bed_price,
            "two_bedroom_price" => $request->two_bed_price,
            "street_address" => $request->street_address,
            "map_location" => $request->apartment_map_location,
            "sqfeet_area" => $request->sq_feet_area,
            "description" => $request->apartment_description,
            "neighbourhood_description" => $request->neighbourhood_description,
            "apartment_type" => $request->apartment_type,
            "available_from" => $request->available_from,
            "available_till" => $request->available_till,
            'featured_image' => $featuredImgTimeStamp,
            'multiple_images' => implode('|', $image),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'concierge' => $request->concierge ?? "off",
            'parking' => $request->parking ?? "off",
            'elevator' => $request->elevator ?? "off",
            'air_conditioning' => $request->air_conditioning ?? "off",
            'personal_safe' => $request->personal_safe ?? "off",
            'private_balcony' => $request->private_balcony ?? "off",
            'kitchen' => $request->kitchen ?? "off",
            'washing' => $request->washing ?? "off",
            'dishwasher' => $request->dishwasher ?? "off",
            'pet_friendly' => $request->pet_friendly ?? "off",
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
        $images = explode('|', $findApartment->multiple_images);
        $fetchLocArr = DB::table("locations")->pluck('location');
        return view('Admin.EditApartment')->with(compact('findApartment', 'images', 'fetchLocArr'));
    }

    public function updateApartment($id, Request $request)
    {
        $findApartment = DB::table('apartments')->find($id);
        // Form Validation
        $request->validate([
            "apartment_name" => "required",
            "apartment_location" => "required",
            "street_address" => "required",
            "one_bed_price" => "required",
            "two_bed_price" => "required",
            "apartment_map_location" => "required",
            "sq_feet_area" => "required",
            "apartment_description" => "required",
            "apartment_type" => "required",
            'available_from' => 'required',
            'available_till' => 'required'
        ]);


        // Loop through multiple images
        $image = array();
        if ($files = $request->file('apartment_multi_images')) {
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
            $image = explode("|", $findApartment->multiple_images);
        }

        if ($request->file('featured_img')) {
            // Creating timestamp of featured image
            $featuredImgTimeStamp = time() . '.' . $request->featured_img->getClientOriginalExtension();

            // Store featured image to public folder
            $request->featured_img->move('Apartment/Thubmbnail', $featuredImgTimeStamp);
        } else {
            $featuredImgTimeStamp = $findApartment->featured_image;
        }

        $res = DB::table('apartments')->
            where('id', '=', $id)->
            update([
                "apartment_name" => $request->apartment_name,
                "apartment_location" => $request->apartment_location,
                "one_bedroom_price" => $request->one_bed_price,
                "two_bedroom_price" => $request->two_bed_price,
                "street_address" => $request->street_address,
                "map_location" => $request->apartment_map_location,
                "sqfeet_area" => $request->sq_feet_area,
                "description" => $request->apartment_description,
                "apartment_type" => $request->apartment_type,
                "available_from" => $request->available_from,
                "available_till" => $request->available_till,
                'featured_image' => $featuredImgTimeStamp,
                'multiple_images' => implode('|', $image),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'concierge' => $request->concierge ?? "off",
                'parking' => $request->parking ?? "off",
                'elevator' => $request->elevator ?? "off",
                'air_conditioning' => $request->air_conditioning ?? "off",
                'personal_safe' => $request->personal_safe ?? "off",
                'private_balcony' => $request->private_balcony ?? "off",
                'kitchen' => $request->kitchen ?? "off",
                'washing' => $request->washing ?? "off",
                'dishwasher' => $request->dishwasher ?? "off",
                'pet_friendly' => $request->pet_friendly ?? "off",
                'updated_at' => now()
            ]);

        if ($res) {
            toastr()->success('Apartment record updated successfully');
            return redirect()->back();
        } else {
            toastr()->error('No changes detected');
            return redirect()->back();
        }
    }
    // Fav Appartment Section
    public function topRatedApartments()
    {
        $fetchFavApartment = DB::table('apartments')->where('isFavourite', '=', 1)->get();
        return view("Admin.TopRatedApartments")->with(compact('fetchFavApartment'));
    }


    public function Standards()
    {
        $fetchStandards = DB::table('standards')->get();
        return view('Admin.Standards')->with(compact('fetchStandards'));
    }

    public function addStandard()
    {
        return view("Admin.AddStandards");
    }



    public function createStandard(Request $request)
    {
        // Form Validation
        $request->validate([
            'standard_icon' => 'required|image',
            'standard_text' => 'required'
        ]);
        $timeStampImg = time() . '.' . $request->standard_icon->getClientOriginalExtension();

        $request->standard_icon->move('Standards', $timeStampImg);

        $result = DB::table('standards')->insert([
            'standard_icon' => $timeStampImg,
            'standard_text' => $request->standard_text,
            'created_at' => now()
        ]);

        if ($result) {
            toastr()->success('New standard added successfully');
            return redirect()->back();
        }
    }

    public function editStandard($id)
    {
        $fetchBenefit = DB::table('standards')->find($id);
        return view('Admin.EditBenefit')->with(compact('fetchBenefit'));
    }


    public function updateStandard($id, Request $request)
    {
        $iconImg = DB::table('standards')->find($id);

        if ($request->file('standard_icon')) {
            $timeStampImg = time() . '.' . $request->standard_icon->getClientOriginalExtension();
            $request->standard_icon->move('Standards', $timeStampImg);
        } else {
            $timeStampImg = $iconImg->standard_icon;
        }


        $result = DB::table('standards')
            ->where('id', '=', $id)
            ->update([
                'standard_icon' => $timeStampImg,
                'standard_text' => $request->standard_text,
                'updated_at' => now()
            ]);

        if ($result) {
            toastr()->success('Standard updated successfully');
            return redirect()->back();
        }
    }

    public function deleteStandard($id)
    {
        $res = DB::table('standards')->where('id', '=', $id)->delete();

        if ($res) {
            toastr()->success('Record removed successfully');
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

    public function getCorporateEnquiries()
    {
        $fetchQueries = DB::table('corporate_inquiry')->get();
        return view('Admin.CorporateEnquiries')->with(compact('fetchQueries'));
    }

    public function getGeneralEnquiries(){
        $fetchQueries = DB::table('general_inquiry')->get();
        return view("Admin.GeneralEnquiries")->with(compact('fetchQueries'));
    }

    public function getBookingEnquiries(){
        $fetchQueries = DB::table('booking_inquiry')->get();
        return view("Admin.BookingEnquiries")->with(compact('fetchQueries'));
    }

    public function getJoinSterlingEnquiries(){
        $fetchQueries = DB::table('join_sterling_inquiry')->get();
        return view("Admin.JoinSterlingEnquiries")->with(compact('fetchQueries'));
    }

    public function usersManagement()
    {
        $fetchAllUsers = DB::table('users')->get();
        return view('Admin.UsersManagement', with(compact('fetchAllUsers')));
    }

    public function AddUser()
    {
        return view('Admin.AddUser');
    }

    public function createUserAccount(Request $request)
    {
        // Form Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $isAccountCreated = DB::table("users")->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('123456789'),
            'created_at' => now()
        ]);

        if ($isAccountCreated) {
            toastr()->success('New User Added Successfully.');
            return redirect()->route('View.Users');
        } else {
            toastr()->info('Something went wrong.');
            return redirect()->back();
        }
    }

    public function resetPassword($id)
    {
        $isPasswordReset = DB::table('users')->
            where('id', '=', $id)
            ->update(
                ['password' => Hash::make('123456789')]
            );

        if ($isPasswordReset) {
            toastr()->success('Password reset successfully');
        } else {
            toastr()->info('Something went wrong. Please try again later');
        }
        return redirect()->back();
    }

    public function editAccount($id)
    {
        $findUserAccount = DB::table('users')->find($id);
        return view('Admin.EditUserAccount', with(compact('findUserAccount')));
    }

    public function updateUserAccount(Request $request, $id)
    {
        $isAccountUpdated = DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        if ($isAccountUpdated) {
            toastr()->success('Updated Successfully');
        } else {
            toastr()->info('Somethin went wong');
        }
        return redirect()->back();
    }

    public function deleteUserAccount($id)
    {
        $isAccountDeleted = DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        if ($isAccountDeleted) {
            toastr()->success('Account Removed Successfully.');
        } else {
            toastr()->info('Somethin went wong');
        }
        return redirect()->back();
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('Landing.Page');
    }

    public function Locations()
    {
        $fetchAllLocations = DB::table("locations")->get();
        return view("Admin.Locations", with(compact("fetchAllLocations")));
    }

    public function AddLocation()
    {
        return view("Admin.AddLocation");
    }

    public function createLocation(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|file',
            'location' => 'required'
        ]);

        $thumbnailPath = time() . "." . $request->thumbnail->getClientOriginalExtension();
        $request->thumbnail->move("Locations", $thumbnailPath);

        $isRecCreated = DB::table('locations')->insert([
            'thumbnail_img' => $thumbnailPath,
            'location' => $request->location
        ]);

        if ($isRecCreated) {
            toastr('New Location Added Successfully');
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function editLocation($id)
    {
        $findLocation = DB::table('locations')->find($id);
        return view("Admin.EditLocation", with(compact("findLocation")));
    }

    public function updateLocation(Request $request, $id)
    {
        // Check If user upload new image
        if ($request->file("thumbnail")) {
            $thumbnailPath = time() . "." . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move("Locations", $thumbnailPath);
        } else {
            $findImgPath = DB::table("locations")->
                select('thumbnail_img')->
                where('id', '=', $id)->
                first();
            $thumbnailPath = $findImgPath->thumbnail_img;
        }

        $isLocUpdated = DB::table('locations')->
            where('id', '=', $id)->
            update([
                'thumbnail_img' => $thumbnailPath,
                'location' => $request->location
            ]);

        if ($isLocUpdated) {
            toastr('Selected Location Updated Successfully');
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function deleteLocation($id)
    {
        $delLocation = DB::table('locations')->where("id", '=', $id)->delete();
        if ($delLocation) {
            toastr()->success("Selected location deleted successfully");
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function Testimonials()
    {
        $fetchAllTestimonials = DB::table("feedback")->get();
        return view("Admin.Testimonials", with(compact("fetchAllTestimonials")));
    }

    public function AddTestimonials()
    {
        return view("Admin.AddTestimonials");
    }

    public function createTestimonials(Request $request)
    {
        // Form Validation

        $isFeedbackCreated = DB::table("feedback")->insert([
            'name' => $request->client_name,
            'message' => $request->client_message,
            'rating' => $request->rating
        ]);

        if ($isFeedbackCreated) {
            toastr()->success("Client testimonial added successfully");
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    // FAQ
    public function FAQs()
    {
        $fetchAllFAQs = DB::table("faq")->get();
        return view("Admin.FAQ", with(compact("fetchAllFAQs")));
    }

    public function AddFAQ()
    {

        return view("Admin.AddFAQ");
    }

    public function createFAQ(Request $request)
    {
        // form validation
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $isFAQcreated = DB::table('faq')->insert([
            'question' => $request->question,
            'answer' => $request->answer,
            'created_at' => now()
        ]);

        if ($isFAQcreated) {
            toastr()->success('FAQ added successfully');
            return redirect()->back();
        }
    }

    public function editFAQ($id)
    {
        $findFAQ = DB::table("faq")->find($id);
        return view("Admin.EditFAQ", with(compact("findFAQ")));
    }

    public function updateFAQ(Request $request, $id)
    {
        $isRecUpdated = DB::table('faq')->
            where('id', "=", $id)->
            update([
                'question' => $request->question,
                'answer' => $request->answer
            ]);

        if ($isRecUpdated) {
            toastr()->success("Selected FAQ updated successfully");
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }

    public function deleteFAQ($id)
    {
        $isRecDeleted = DB::table("faq")->where('id', '=', $id)->delete();

        if ($isRecDeleted) {
            toastr()->success("Selected record deleted successfully");
            return redirect()->back();
        } else {
            toastr()->info('Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }
}
