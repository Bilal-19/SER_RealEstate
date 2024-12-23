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

Route::get("/admin/benefits", [AdminController::class, 'Benefits'])->name('Benefits');
Route::get("/admin/add/benefits", [AdminController::class, 'AddBenefit'])->name('Add.Benefits');
Route::post("/admin/create/benefit", [AdminController::class, 'createBenefit'])->name('Create.Benefit');

Route::post("/admin/add/city/record", [AdminController::class, 'createCityRecord'])->name('Create.City.Record');


// Blog - Admin
Route::get("/admin/blog", [AdminController::class, 'Blog'])->name('Blog');
Route::get("/admin/add/blog", [AdminController::class, 'AddBlog'])->name('Add.Blog');
Route::post("/admin/create/blog", [AdminController::class, 'createBlog'])->name('Create.Blog');


// Policy - Admin
Route::get("/admin/policy", [AdminController::class, 'Policy'])->name('Policy');
Route::get("/admin/add/policy", [AdminController::class, 'AddPolicy'])->name('Add.Policy');
Route::post("/admin/create/policy", [AdminController::class, 'createPolicy'])->name('Create.Policy');


// Apartment - Admin
Route::get("/admin/apartments", [AdminController::class, 'Apartments'])->name('Apartments');
Route::post("/admin/create/apartment", [AdminController::class, 'createApartment'])->name('Create.Apartment');
Route::get("/user/view/detail/{id}", [UserController::class, 'viewApartmentDetail'])->name('Detail.View.Apartment');
Route::get("/apartment/availablity/{id}", [UserController::class, 'checkApartmentAvailability'])->name('Check.Apartment.Availability');


// Booking Page - User
Route::get("/booking/{id}/{checkIn}/{checkOut}", [UserController::class, 'Booking'])->name('Booking');


// Thank you page - User
Route::get("/thankyou", [UserController::class, 'ThankYou']);


// Testing purpose
Route::get("/nearby", [UserController::class, 'getNeighbours']);


Route::get("admin/toggle/fav/apt/{id}", [AdminController::class, 'toggleFav'])->name('Toggle.Fav');


// Payment Routes
Route::post("/booking/payment/{apartmentID}/{checkIn}/{checkOut}/{totalDays}/{totalAmount}", [UserController::class,'stripePost'])->name('stripe.post');
