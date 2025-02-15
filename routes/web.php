<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;




// Grouped Routes that shared same User Controller
Route::controller(UserController::class)->group(
    function () {
        Route::get("/", 'index')->name(name: 'Landing.Page');
        Route::get("appartments", 'viewAppartments')->name('View.Appartments');
        Route::get("corporate", 'viewCorporate')->name('View.Corporate');
        Route::get("about", 'aboutSterling')->name('View.About');
        Route::get("join-sterling", 'JoinSterlingEnquiry')->name('View.Enquiry.Form');
        Route::get("experience", 'viewExperience')->name('view.Experience');
        Route::get("locations", 'Locations')->name('view.Locations');
        Route::get("contact-us", 'ContactUs')->name('view.ContactUs');
        Route::get("booking-enquiry", 'ViewBookingEnquiry')->name(name: 'Booking.Enquiry');
        Route::post("submit/booking-enquiry", 'SubmitBookingEnquiry')->name(name: 'SubmitBookingEnquiry');
        Route::get("general-enquiry", 'generalEnquiry')->name(name: 'General.Enquiry');
        Route::post("submit/general-enquiry", 'SubmitGeneralEnquiry')->name(name: 'SubmitGeneralEnquiry');
        Route::post("submit/location-enquiry", 'SubmitLocationEnquiry')->name(name: 'SubmitLocationEnquiry');
        Route::get("faqs", 'FAQs')->name(name: 'FAQs');
        Route::get("location/{id}", 'LocationDetail')->name(name: 'LocationDetail');
        Route::get("property-type-house", 'propertyTypeHouse')->name(name: 'Property.Houses');
        Route::get("property-type-apartments", 'propertyTypeApartment')->name(name: 'Property.Apartments');
        Route::get("property-type-rooms", 'propertyTypeRooms')->name(name: 'Property.Rooms');
        Route::get("view/available/appartment", 'viewAvailableAparment')->name('Get.Available.Apartment');
        Route::get("/user/view/detail/{id}", 'viewApartmentDetail')->name('Detail.View.Apartment');
        Route::get("/apartment/availablity/{id}", 'checkApartmentAvailability')->name('Check.Apartment.Availability');
        Route::get("/search/location", 'SearchLocation')->name('Book.Now');
        // Inquiry
        Route::post("/corporate-enquiry", 'createCorporateInquiry')->name('Create.CorporateInquiry');
        Route::post("/join-sterling-enquiry", 'submitJoinSterlingInquiry')->name('JoinSterlingInquiry');

        // Booking Page - User
        Route::get("/booking/{id}/{checkIn}/{checkOut}/{bedrooms}", 'Booking')->name('Booking');

        // Payment Routes
        Route::post("/booking/payment/{apartmentID}/{checkIn}/{checkOut}/{totalDays}/{totalAmount}/{apartment_price}", 'stripePost')->name('stripe.post');

    }
);


// Grouping Routes that sharing same Admin Controller.
Route::controller(AdminController::class)->group(
    function () {
        Route::get("/admin/dashboard", 'Dashboard')->name('Dashboard');
        Route::get("/admin/view-appartment", 'viewAppartment')->name('View.Appartment');
        Route::get("/admin/add-appartment", 'addAppartment')->name('Add.Appartment');
        Route::get("/admin/top-rated-appartment", 'topRatedApartments')->name('Favourite.Apartment');
        Route::get("/admin/add/top-rated-appartment", 'addFavouriteApartment')->name('Add.Favourite.Apartment');
        Route::post("/admin/create/top-rated-appartment", 'createFavouriteApartment')->name('Create.Favourite.Apartment');

        // Standards
        Route::get("/admin/standards", 'Standards')->name('Standard');
        Route::get("/admin/add-standard", 'addStandard')->name('Add.Standard');
        Route::post("/admin/create-standard", 'createStandard')->name('Create.Standard');
        Route::get("/admin/edit-standard/{id}", 'editStandard')->name('Edit.Standard');
        Route::get("/admin/delete-standard/{id}", 'deleteStandard')->name('Delete.Standard');
        Route::post("/admin/update-standard/{id}", 'updateStandard')->name('Update.Standard');

        // Apartment
        Route::get("/admin/apartments", 'Apartments')->name('Apartments');
        Route::post("/admin/create-apartment", 'createApartment')->name('Create.Apartment');
        Route::get("/delete-apartment/{id}", 'deleteApartment')->name('Delete.Apartment');
        Route::get("/edit-apartment/{id}", 'editApartment')->name('Edit.Apartment');
        Route::post("/update-apartment/{id}", 'updateApartment')->name('Update.Apartment');
        Route::get("/edit-apartment/{id}", 'editApartment')->name('Edit.Apartment');
        Route::get("admin/toggle-top-rated-apartment/{id}", 'toggleFav')->name('Toggle.Fav');

        // Testimonials
        Route::get("/admin/testimonials", 'Testimonials')->name('Admin.Testimonials');
        Route::get("/admin/add-testimonial", 'AddTestimonials')->name('Admin.AddTestimonials');
        Route::post("/admin/create-testimonial", 'createTestimonials')->name('Admin.CreateTestimonials');
        Route::get("/admin/delete-testimonial/{id}", 'deleteTestimonial')->name('Admin.DeleteTestimonial');
        Route::get("/admin/edit-testimonial/{id}", 'editTestimonial')->name('Admin.EditTestimonial');
        Route::post("/admin/update-testimonial/{id}", 'updateTestimonial')->name('Admin.UpdateTestimonial');
        Route::get("/admin/toggle-testimonial/{id}", 'toggleTestimonialVisibility')->name('Admin.ToggleVisibility');

        // Booking
        Route::get("admin/booking", 'Booking')->name('View.Booking');
        Route::get("admin/booking-pdf/{id}", 'generatePDF')->name('Generate.PDF');
        Route::get("admin/logout", 'signOut')->name('Admin.Logout');


        // Registered Users
        Route::get("admin/users", 'usersManagement')->name('View.Users');
        Route::get("admin/add-user", 'AddUser')->name('View.AddUser');
        Route::post("admin/create-user", 'createUserAccount')->name('CreateUserAccount');
        Route::get("admin/reset-password/{id}", 'resetPassword')->name('ResetPassword');
        Route::get("admin/edit-user/{id}", 'editAccount')->name('EditAccount');
        Route::post("admin/update-user/{id}", 'updateUserAccount')->name('Users.UpdateUserAccount');
        Route::get("admin/delete-user/{id}", 'deleteUserAccount')->name('DeleteUserAccount');


        // Locations
        Route::get("admin/locations", 'Locations')->name('Admin.Locations');
        Route::get("admin/add-location", 'AddLocation')->name('Admin.AddLocation');
        Route::post("admin/create-location", 'createLocation')->name('Admin.CreateLocation');
        Route::get("admin/delete-location/{id}", 'deleteLocation')->name('Admin.DeleteLocation');
        Route::get("admin/edit-location/{id}", 'editLocation')->name('Admin.EditLocation');
        Route::post("admin/update-location/{id}", 'updateLocation')->name('Admin.UpdateLocation');

        // FAQs
        Route::get("admin/faqs", 'FAQs')->name('Admin.FAQs');
        Route::get("admin/add-faq", 'AddFAQ')->name('Admin.AddFAQ');
        Route::post("admin/create-faq", 'createFAQ')->name('Admin.createFAQ');
        Route::get("admin/edit-faq/{id}", 'editFAQ')->name('Admin.EditFAQ');
        Route::post("admin/update-faq/{id}", 'updateFAQ')->name('Admin.updateFAQ');
        Route::get("admin/delete-faq/{id}", 'deleteFAQ')->name('Admin.deleteFAQ');

        // Enquiries
        Route::get("/admin/corporate-enquiries", 'getCorporateEnquiries')->name('Corporate.Enquiries');
        Route::get("/admin/general-enquiries", 'getGeneralEnquiries')->name('General.Enquiries');
        Route::get("/admin/booking-enquiries", 'getBookingEnquiries')->name('Booking.Enquiries');
        Route::get("/admin/join-sterling-enquiries", 'getJoinSterlingEnquiries')->name('Join.Sterling.Enquiries');

    }
);

require __DIR__ . '/auth.php';
