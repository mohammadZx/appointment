<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\ListingController;
use App\Http\Controllers\Listing\ListingTimeController;
use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



// Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/faq', fn() => view('pages.faq'))->name('faq');



// Front Routes
Route::resource('listing', ListingController::class);
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::post('listing/get-times', [ListingTimeController::class, 'getTimes'])->name('listing.get_times');




// User Routes
Route::prefix('/user')->name('user.')->middleware('auth')->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'storeData'])->name('profile');
    
    Route::resource('booking', BookingController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('listing', App\Http\Controllers\User\Listing\ListingController::class);

});



// Adming Routes
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function(){

    Route::resource('appointment', App\Http\Controllers\Admin\Appointment\AppointmentController::class);
    Route::resource('listing', App\Http\Controllers\Admin\Listing\ListingControlle::class);
    Route::resource('category', App\Http\Controllers\Admin\Category\CategoryController::class);
    Route::resource('comment', App\Http\Controllers\Admin\Comment\CommentController::class);
    Route::resource('city', App\Http\Controllers\Admin\Locate\CityController::class);
    Route::resource('province', App\Http\Controllers\Admin\Locate\ProvinceController::class);
    Route::resource('service', App\Http\Controllers\Admin\Service\ServiceController::class);
    Route::resource('sub-service', App\Http\Controllers\Admin\Service\SubServiceController::class);
    Route::resource('user', App\Http\Controllers\Admin\User\UserController::class);
    Route::resource('option', App\Http\Controllers\Admin\Option\OptionController::class);

});

