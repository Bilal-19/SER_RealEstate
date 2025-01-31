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
Route::get("benefits", [UserController::class, 'viewBenefits'])->name('View.Benefits');
Route::get("corporate", [UserController::class, 'viewCorporate'])->name('View.Corporate');
Route::get("about", [UserController::class, 'viewAbout'])->name('View.About');
Route::get("blogs", [UserController::class, 'viewBlogs'])->name('View.Blogs');
Route::get("join/sterling", [UserController::class, 'viewEnquiryForm'])->name('View.Enquiry.Form');
Route::get("experience", [UserController::class, 'viewExperience'])->name('view.Experience');
Route::get("user/locations", [UserController::class, 'Locations'])->name('view.Locations');

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
Route::get("/admin/read/blog/{id}", [UserController::class, 'readBlog'])->name('Read.Blog');
Route::get("/admin/edit/blog/{id}", [AdminController::class, 'editBlog'])->name('Edit.Blog');
Route::post("/admin/update/blog/{id}", [AdminController::class, 'updateBlog'])->name('Update.Blog');
Route::get("/admin/delete/blog/{id}", [AdminController::class, 'deleteBlog'])->name('Delete.Blog');


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

// Testimonials - Admin
Route::get("/admin/testimonials", [AdminController::class, 'Testimonials'])->name('Admin.Testimonials');
Route::get("/admin/add/testimonial", [AdminController::class, 'AddTestimonials'])->name('Admin.AddTestimonials');
Route::post("/admin/create/testimonial", [AdminController::class, 'createTestimonials'])->name('Admin.CreateTestimonials');



// Booking Page - User
Route::get("/booking/{id}/{checkIn}/{checkOut}", [UserController::class, 'Booking'])->name('Booking');


// Thank you page - User
Route::get("/thankyou", [UserController::class, 'ThankYou']);


// Testing purpose
Route::get("/nearby", [UserController::class, 'getNeighbours']);

Route::get("/book/now", [UserController::class, 'BookNow'])->name('Book.Now');

Route::get("admin/toggle/fav/apt/{id}", [AdminController::class, 'toggleFav'])->name('Toggle.Fav');


// Payment Routes
Route::post("/booking/payment/{apartmentID}/{checkIn}/{checkOut}/{totalDays}/{totalAmount}", [UserController::class, 'stripePost'])->name('stripe.post');


// Inquiry
Route::post("/create/inquiry", [UserController::class, 'createInquiry'])->name('Create.CorporateInquiry');
Route::get("/admin/inquiry", [AdminController::class, 'readInquiries'])->name('Read.Queries');

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


// Send Payment Email
Route::get("/admin/send/email", [UserController::class, 'sendEmail']);


// Email Test Route
Route::get('/test-email', function () {
    \Mail::raw('This is a test email', function ($message) {
        $message->to('bilalmuhammadyousuf543@gmail.com')
                ->subject('Test Email');
    });

    return 'Email sent successfully!';
});
require __DIR__.'/auth.php';
