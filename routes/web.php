<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/", [UserController::class, 'index'])->name(name: 'Landing.Page');
Route::get("appartments", [UserController::class, 'viewAppartments'])->name('View.Appartments');
Route::get("corporate", [UserController::class, 'viewCorporate'])->name('View.Corporate');
Route::get("about", [UserController::class, 'aboutSterling'])->name('View.About');
Route::get("join/sterling", [UserController::class, 'JoinSterlingEnquiry'])->name('View.Enquiry.Form');
Route::get("experience", [UserController::class, 'viewExperience'])->name('view.Experience');
Route::get("user/locations", [UserController::class, 'Locations'])->name('view.Locations');
Route::get("contact/us", [UserController::class, 'ContactUs'])->name('view.ContactUs');
Route::get("booking/enquiry", [UserController::class, 'ViewBookingEnquiry'])->name(name: 'Booking.Enquiry');
Route::post("submit/booking/enquiry", [UserController::class, 'SubmitBookingEnquiry'])->name(name: 'SubmitBookingEnquiry');
Route::get("general/enquiry", [UserController::class, 'generalEnquiry'])->name(name: 'General.Enquiry');
Route::post("submit/general/enquiry", [UserController::class, 'SubmitGeneralEnquiry'])->name(name: 'SubmitGeneralEnquiry');
Route::post("submit/location/enquiry", [UserController::class, 'SubmitLocationEnquiry'])->name(name: 'SubmitLocationEnquiry');
Route::get("faqs", [UserController::class, 'FAQs'])->name(name: 'FAQs');
Route::get("location/{id}", [UserController::class, 'LocationDetail'])->name(name: 'LocationDetail');
Route::get("properties/house", [UserController::class, 'propertyTypeHouse'])->name(name: 'Property.Houses');
Route::get("properties/apartments", [UserController::class, 'propertyTypeApartment'])->name(name: 'Property.Apartments');
Route::get("properties/rooms", [UserController::class, 'propertyTypeRooms'])->name(name: 'Property.Rooms');


Route::get("/view/available/appartment", [UserController::class, 'viewAvailableAparment'])->name('Get.Available.Apartment');
// Admin Dashboard
Route::get("/admin/dashboard", [AdminController::class, 'Dashboard'])->name('Dashboard');
Route::get("/admin/view/appartment", [AdminController::class, 'viewAppartment'])->name('View.Appartment');
Route::get("/admin/add/appartment", [AdminController::class, 'addAppartment'])->name('Add.Appartment');
Route::get("/admin/top/rated/appartment", [AdminController::class, 'topRatedApartments'])->name('Favourite.Apartment');
Route::get("/admin/add/favourite/appartment", [AdminController::class, 'addFavouriteApartment'])->name('Add.Favourite.Apartment');
Route::post("/admin/create/favourite/appartment", [AdminController::class, 'createFavouriteApartment'])->name('Create.Favourite.Apartment');

// Standards - Admin
Route::get("/admin/standards", [AdminController::class, 'Standards'])->name('Standard');
Route::get("/admin/add/standard", [AdminController::class, 'addStandard'])->name('Add.Standard');
Route::post("/admin/create/standard", [AdminController::class, 'createStandard'])->name('Create.Standard');
Route::get("/admin/edit/standard/{id}", [AdminController::class, 'editStandard'])->name('Edit.Standard');
Route::get("/admin/delete/standard/{id}", [AdminController::class, 'deleteStandard'])->name('Delete.Standard');
Route::post("/admin/update/standard/{id}", [AdminController::class, 'updateStandard'])->name('Update.Standard');


// Apartment - Admin
Route::get("/admin/apartments", [AdminController::class, 'Apartments'])->name('Apartments');
Route::post("/admin/create/apartment", [AdminController::class, 'createApartment'])->name('Create.Apartment');
Route::get("/user/view/detail/{id}", [UserController::class, 'viewApartmentDetail'])->name('Detail.View.Apartment');
Route::get("/apartment/availablity/{id}", [UserController::class, 'checkApartmentAvailability'])->name('Check.Apartment.Availability');
Route::get("/delete/apartment/{id}", [AdminController::class, 'deleteApartment'])->name('Delete.Apartment');
Route::get("/edit/apartment/{id}", [AdminController::class, 'editApartment'])->name('Edit.Apartment');
Route::post("/update/apartment/{id}", [AdminController::class, 'updateApartment'])->name('Update.Apartment');
Route::get("/edit/apartment/{id}", [AdminController::class, 'editApartment'])->name('Edit.Apartment');
Route::get("admin/toggle/fav/apt/{id}", [AdminController::class, 'toggleFav'])->name('Toggle.Fav');

// Testimonials - Admin
Route::get("/admin/testimonials", action: [AdminController::class, 'Testimonials'])->name('Admin.Testimonials');
Route::get("/admin/add/testimonial", [AdminController::class, 'AddTestimonials'])->name('Admin.AddTestimonials');
Route::post("/admin/create/testimonial", [AdminController::class, 'createTestimonials'])->name('Admin.CreateTestimonials');
Route::get("/admin/del/testimonial/{id}", [AdminController::class, 'deleteTestimonial'])->name('Admin.DeleteTestimonial');
Route::get("/admin/edit/testimonial/{id}", [AdminController::class, 'editTestimonial'])->name('Admin.EditTestimonial');
Route::post("/admin/update/testimonial/{id}", [AdminController::class, 'updateTestimonial'])->name('Admin.UpdateTestimonial');



// Booking Page - User
Route::get("/booking/{id}/{checkIn}/{checkOut}/{bedrooms}", [UserController::class, 'Booking'])->name('Booking');


// Thank you page - User
Route::get("/thankyou", [UserController::class, 'ThankYou']);


Route::get("/search/location", [UserController::class, 'SearchLocation'])->name('Book.Now');



// Payment Routes
Route::post("/booking/payment/{apartmentID}/{checkIn}/{checkOut}/{totalDays}/{totalAmount}/{apartment_price}", [UserController::class, 'stripePost'])->name('stripe.post');


// Inquiry
Route::post("/corporate/inquiry", [UserController::class, 'createCorporateInquiry'])->name('Create.CorporateInquiry');
Route::post("/join/sterling/inquiry", [UserController::class, 'submitJoinSterlingInquiry'])->name('JoinSterlingInquiry');

// Booking - Admin
Route::get("admin/booking", [AdminController::class, 'Booking'])->name('View.Booking');

Route::get("admin/booking/pdf/{id}", [AdminController::class, 'generatePDF'])->name('Generate.PDF');
Route::get("admin/logout", [AdminController::class, 'signOut'])->name('Admin.Logout');

// Admin - Logout


// Users - Admin
Route::get("admin/users", [AdminController::class, 'usersManagement'])->name('View.Users');
Route::get("admin/add/user", [AdminController::class, 'AddUser'])->name('View.AddUser');
Route::post("admin/create/user", [AdminController::class, 'createUserAccount'])->name('CreateUserAccount');
Route::get("admin/reset/password/{id}", [AdminController::class, 'resetPassword'])->name('ResetPassword');
Route::get("admin/edit/user/{id}", [AdminController::class, 'editAccount'])->name('EditAccount');
Route::post("admin/update/user/{id}", [AdminController::class, 'updateUserAccount'])->name('Users.UpdateUserAccount');
Route::get("admin/delete/user/{id}", [AdminController::class, 'deleteUserAccount'])->name('DeleteUserAccount');


// Locations - Admin
Route::get("admin/locations", [AdminController::class, 'Locations'])->name('Admin.Locations');
Route::get("admin/add/location", [AdminController::class, 'AddLocation'])->name('Admin.AddLocation');
Route::post("admin/create/location", [AdminController::class, 'createLocation'])->name('Admin.CreateLocation');
Route::get("admin/delete/location/{id}", [AdminController::class, 'deleteLocation'])->name('Admin.DeleteLocation');
Route::get("admin/edit/location/{id}", [AdminController::class, 'editLocation'])->name('Admin.EditLocation');
Route::post("admin/update/location/{id}", [AdminController::class, 'updateLocation'])->name('Admin.UpdateLocation');

// FAQs - Admin
Route::get("admin/faqs", [AdminController::class, 'FAQs'])->name('Admin.FAQs');
Route::get("admin/add/faq", [AdminController::class, 'AddFAQ'])->name('Admin.AddFAQ');
Route::post("admin/create/faq", [AdminController::class, 'createFAQ'])->name('Admin.createFAQ');
Route::get("admin/edit/faq/{id}", [AdminController::class, 'editFAQ'])->name('Admin.EditFAQ');
Route::post("admin/update/faq/{id}", [AdminController::class, 'updateFAQ'])->name('Admin.updateFAQ');
Route::get("admin/del/faq/{id}", [AdminController::class, 'deleteFAQ'])->name('Admin.deleteFAQ');


// Send Payment Email
Route::get("/admin/send/email", [UserController::class, 'sendEmail']);

// Enquiry - Admin
Route::get("/admin/corporate/enquiries", [AdminController::class, 'getCorporateEnquiries'])->name('Corporate.Enquiries');
Route::get("/admin/general/enquiries", [AdminController::class, 'getGeneralEnquiries'])->name('General.Enquiries');
Route::get("/admin/booking/enquiries", [AdminController::class, 'getBookingEnquiries'])->name('Booking.Enquiries');
Route::get("/admin/join/sterling/enquiries", [AdminController::class, 'getJoinSterlingEnquiries'])->name('Join.Sterling.Enquiries');

// Email Test Route
Route::get('/test-email', function () {
    \Mail::raw('This is a test email', function ($message) {
        $message->to('bilalmuhammadyousuf543@gmail.com')
                ->subject('Test Email');
    });

    return 'Email sent successfully!';
});
require __DIR__.'/auth.php';
