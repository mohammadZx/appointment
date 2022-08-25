<?php

use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\ListingTimeController;
use App\Http\Controllers\NotifyAppointmentController;
use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\WishlistController;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send-code/{phone}', [\App\Http\Controllers\Auth\ForceAuthController::class, 'sendCode'])->name('send-code');
Route::post('/code-login', [\App\Http\Controllers\Auth\ForceAuthController::class,'logincode'])->name('login-code');

// Auth
Auth::routes();
Route::get('/register', fn() => redirect('/login'));


// Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'] )->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/ads', fn() => view('pages.ads'))->name('ads');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/notify-appointment', [NotifyAppointmentController::class, 'index'])->name('notify-appointment');



// Front Routes
Route::resource('category', CategoryController::class);
Route::post('listing/get-times', [ListingTimeController::class, 'getTimes'])->name('listing.get_times');
Route::post('listing/add-attachment', [\App\Http\Controllers\Listing\ListingAttachmentController::class, 'store'])->name('listing.add_attachment');
Route::post('listing/delete-attachment/{attachment}', [\App\Http\Controllers\Listing\ListingAttachmentController::class, 'destroy'])->name('listing.delete_attachment');
Route::get('listing/get-attachment', [\App\Http\Controllers\Listing\ListingAttachmentController::class, 'getImage'])->name('listing.get_attachment');
Route::get('service/{service}/subservices', [App\Http\Controllers\Service\ServiceController::class, 'subservices']);
Route::resource('listing', \App\Http\Controllers\Listing\ListingController::class);
Route::resource('service', App\Http\Controllers\Service\ServiceController::class);




// User Routes
Route::prefix('/user')->name('user.')->middleware('auth')->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'storeData'])->name('profile');
    
    Route::resource('wishlist', App\Http\Controllers\User\WishlistController::class);
    Route::resource('booking', BookingController::class);

    Route::post('appointment/finish/{appointment}', [AppointmentController::class, 'finish'])->name('appointment.finish');
    Route::post('appointment/gap', [AppointmentController::class, 'takeGap'])->name('appointment.gap');
    Route::resource('appointment', AppointmentController::class);
    Route::post('changestatus/{appointment}', [AppointmentController::class, 'changestatus'])->name('appointment.changestatus');

    Route::resource('listing', App\Http\Controllers\User\Listing\ListingController::class);
    Route::get('wishlist/manage/{id}', [WishlistController::class, 'manage']);
});



// Adming Routes
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function(){
    Route::post('changestatus/{appointment}', [App\Http\Controllers\Admin\Appointment\AppointmentController::class, 'changestatus'])->name('appointment.changestatus');
    Route::resource('appointment', App\Http\Controllers\Admin\Appointment\AppointmentController::class);
    Route::post('listing/changestatus/{listing}', [App\Http\Controllers\Admin\Listing\ListingController::class, 'changeStatus'])->name('listing.changestatus');
    Route::resource('listing', App\Http\Controllers\Admin\Listing\ListingController::class);
    Route::resource('category', App\Http\Controllers\Admin\Category\CategoryController::class);
    Route::get('comment/changestatus/{comment}' , [App\Http\Controllers\Admin\Comment\CommentController::class , 'changeStatus'])->name('comment.changestatus');
    Route::resource('comment', App\Http\Controllers\Admin\Comment\CommentController::class);
    Route::resource('city', App\Http\Controllers\Admin\Locate\CityController::class);
    Route::resource('province', App\Http\Controllers\Admin\Locate\ProvinceController::class);
    Route::resource('service', App\Http\Controllers\Admin\Service\ServiceController::class);
    Route::resource('subservice', App\Http\Controllers\Admin\Service\SubServiceController::class);
    Route::resource('user', App\Http\Controllers\Admin\User\UserController::class);
    Route::resource('option', App\Http\Controllers\Admin\Option\OptionController::class);

});




Route::post('/contact', function(Request $req){
    $req->validate([
        'phone' => 'required|size:11',
        'name' => 'required',
        'message' => 'required'
    ]);

    Mail::to('info@ontime2.com')->send(new ContactMail($req->all()));

    return redirect()->back()->with('message', [
        'type' =>  'success',
        'message' => 'اطلاعات شما با موفقیت ارسال شد'
    ]);

})->name('contactpost');