<?php

use App\Http\Controllers\Listing\ListingController;
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

// Auth
Auth::routes();



// Pages
Route::get('/', fn() => view('pages.index'))->name('home');
Route::get('/about', fn() => view('pages.about'))->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::get('/faq', fn() => view('pages.faq'))->name('faq');



// Front Routes
Route::resource('listing', ListingController::class);


// User Routes


// Adming Routes

