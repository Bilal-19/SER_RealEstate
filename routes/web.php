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

// Admin Dashboard
Route::get("/admin/dashboard", [AdminController::class, 'Dashboard'])->name('Dashboard');
Route::get("/admin/view/cities", [AdminController::class, 'ViewCities'])->name('View.Cities');
Route::get("/admin/add/city", [AdminController::class, 'addCity'])->name('Add.City');
Route::get("/admin/view/appartment", [AdminController::class, 'viewAppartment'])->name('View.Appartment');
Route::get("/admin/add/appartment", [AdminController::class, 'addAppartment'])->name('Add.Appartment');


Route::post("/admin/add/city/record", [AdminController::class, 'createCityRecord'])->name('Create.City.Record');
