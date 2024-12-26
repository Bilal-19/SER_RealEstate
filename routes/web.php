<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [UserController::class, 'index'])->name(name: 'Landing.Page');
Route::get("/view/appartments", [UserController::class, 'viewAppartments'])->name('View.Appartments');
Route::get("/view/benefits", [UserController::class, 'viewBenefits'])->name('View.Benefits');
Route::get("/view/corporate", [UserController::class, 'viewCorporate'])->name('View.Corporate');
Route::get("/view/about", [UserController::class, 'viewAbout'])->name('View.About');
Route::get("/view/blogs", [UserController::class, 'viewBlogs'])->name('View.Blogs');
Route::get("/view/enquiry/form", [UserController::class, 'viewEnquiryForm'])->name('View.Enquiry.Form');

Route::get("/view/available/appartment", [UserController::class, 'viewAvailableAparment'])->name('Get.Available.Apartment');
// Admin Dashboard
Route::get("/admin/dashboard", [AdminController::class, 'Dashboard'])->name('Dashboard');
Route::get("/admin/view/appartment", [AdminController::class, 'viewAppartment'])->name('View.Appartment');
Route::get("/admin/add/appartment", [AdminController::class, 'addAppartment'])->name('Add.Appartment');
Route::get("/admin/favourite/appartment", [AdminController::class, 'favouriteApartments'])->name('Favourite.Apartment');
Route::get("/admin/add/favourite/appartment", [AdminController::class, 'addFavouriteApartment'])->name('Add.Favourite.Apartment');
Route::post("/admin/create/favourite/appartment", [AdminController::class, 'createFavouriteApartment'])->name('Create.Favourite.Apartment');

// Benefits - Admin
Route::get("/admin/benefits", [AdminController::class, 'Benefits'])->name('Benefits');
Route::get("/admin/add/benefits", [AdminController::class, 'AddBenefit'])->name('Add.Benefits');
Route::post("/admin/create/benefit", [AdminController::class, 'createBenefit'])->name('Create.Benefit');
Route::get("/admin/edit/benefit/{id}", [AdminController::class, 'editBenefit'])->name('Edit.Benefit');
Route::get("/admin/delete/benefit/{id}", [AdminController::class, 'deleteBenefit'])->name('Delete.Benefit');
Route::post("/admin/update/benefit/{id}", [AdminController::class, 'updateBenefit'])->name('Update.Benefit');



// Blog - Admin
Route::get("/admin/blog", [AdminController::class, 'Blog'])->name('Blog');
Route::get("/admin/add/blog", [AdminController::class, 'AddBlog'])->name('Add.Blog');
Route::post("/admin/create/blog", [AdminController::class, 'createBlog'])->name('Create.Blog');


// Policy - Admin
Route::get("/admin/policy", [AdminController::class, 'Policy'])->name('Policy');
Route::get("/admin/add/policy", [AdminController::class, 'AddPolicy'])->name('Add.Policy');
Route::post("/admin/create/policy", [AdminController::class, 'createPolicy'])->name('Create.Policy');
Route::get("/admin/edit/policy/{id}", [AdminController::class, 'editPolicy'])->name('Edit.Policy');
Route::post("/admin/update/policy/{id}", [AdminController::class, 'updatePolicy'])->name('Update.Policy');
Route::get("/admin/delete/policy/{id}", [AdminController::class, 'deletePolicy'])->name('Delete.Policy');


// Apartment - Admin
Route::get("/admin/apartments", [AdminController::class, 'Apartments'])->name('Apartments');
Route::post("/admin/create/apartment", [AdminController::class, 'createApartment'])->name('Create.Apartment');
Route::get("/user/view/detail/{id}", [UserController::class, 'viewApartmentDetail'])->name('Detail.View.Apartment');
Route::get("/apartment/availablity/{id}", [UserController::class, 'checkApartmentAvailability'])->name('Check.Apartment.Availability');
Route::get("/delete/apartment/{id}", [AdminController::class, 'deleteApartment'])->name('Delete.Apartment');
Route::get("/edit/apartment/{id}", [AdminController::class, 'editApartment'])->name('Edit.Apartment');
Route::post("/update/apartment/{id}", [AdminController::class, 'updateApartment'])->name('Update.Apartment');
Route::get("/edit/apartment/{id}", [AdminController::class, 'editApartment'])->name('Edit.Apartment');


// Booking Page - User
Route::get("/booking/{id}/{checkIn}/{checkOut}", [UserController::class, 'Booking'])->name('Booking');


// Thank you page - User
Route::get("/thankyou", [UserController::class, 'ThankYou']);


// Testing purpose
Route::get("/nearby", [UserController::class, 'getNeighbours']);


Route::get("admin/toggle/fav/apt/{id}", [AdminController::class, 'toggleFav'])->name('Toggle.Fav');


// Payment Routes
Route::post("/booking/payment/{apartmentID}/{checkIn}/{checkOut}/{totalDays}/{totalAmount}", [UserController::class, 'stripePost'])->name('stripe.post');


// Inquiry
Route::post("/create/inquiry", [UserController::class, 'createInquiry'])->name('Create.Inquiry');
Route::get("/admin/inquiry", [AdminController::class, 'readInquiries'])->name('Read.Queries');

// Booking - Admin
Route::get("admin/booking", [AdminController::class, 'Booking'])->name('View.Booking');

Route::get("admin/booking/pdf/{id}", [AdminController::class, 'generatePDF'])->name('Generate.PDF');


// Send Payment Email
Route::get("/admin/send/email", [AdminController::class, 'sendEmail']);
