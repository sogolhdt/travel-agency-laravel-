<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/traveling/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');

// route to get the reservation view page  
Route::get('/traveling/reservation/{cityId}', [App\Http\Controllers\Traveling\TravelingController::class, 'reservation'])->name('reservation');
Route::post('/traveling/reservation', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservation'])->name('make.reservation');

// deals 
Route::get('/deals', [App\Http\Controllers\Deals\DealsController::class, 'dealsView'])->name('deals');
Route::post('/deals/search', [App\Http\Controllers\Deals\DealsController::class, 'search'])->name('search-deals');

// profile
Route::get('/user/bookings', [App\Http\Controllers\User\UserController::class, 'bookingsList'])->name('my-bookings');
