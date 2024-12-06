<?php

use App\Http\Controllers\AdminController;
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

// Admin Dashboard
Route::get("/admin/dashboard", [AdminController::class, 'Dashboard'])->name('Dashboard');
Route::get("/admin/view/cities", [AdminController::class, 'ViewCities'])->name('View.Cities');
Route::get("/admin/add/city", [AdminController::class, 'addCity'])->name('Add.City');
Route::get("/admin/view/appartment", [AdminController::class, 'viewAppartment'])->name('View.Appartment');
Route::get("/admin/add/appartment", [AdminController::class, 'addAppartment'])->name('Add.Appartment');
