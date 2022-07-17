<?php

use App\Http\Controllers\Admin\Locate\CityController;
use App\Http\Controllers\Admin\Locate\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('city-search', [CityController::class, 'searchAjax']);
Route::post('province-search', [ProvinceController::class, 'searchAjax']);