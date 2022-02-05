<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;
use Admin\UserController;
use Admin\TourController;
use Admin\TicketController;

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

Route::get('/', 'HomeController@home');

Route::middleware(['auth','verified'])->name('home')->group(function (){
    Route::get('dashboard','HomeController@index');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth','verified','can:is-admin'])->name('admin.')->group(function (){

    Route::resource('/users', UserController::class);
    Route::resource('/tours', TourController::class);
    Route::resource('/tickets', TicketController::class);
    Route::post('/tickets/cancel/{id}', 'Admin\TicketController@cancel');
    Route::view('/profile', 'admin.edit-profile')->name('profile');
    Route::patch('/profile/update/{id}', 'Admin\ProfileController@update');
    Route::view('/password/edit', 'admin.edit-password')->name('password.edit');
});
// User Routes
Route::middleware(['auth','verified'])->name('user.')->group(function (){
    Route::get('/user/book', 'BookingController@index');
    Route::get('/user/book/ticket/{id}', 'BookingController@ticket');
    Route::post('/user/book/store/{user_id}/{tour_id}', 'BookingController@store');
    Route::get('/user/tickets', 'TicketController@index');
    Route::post('/user/tickets/cancel/{id}', 'TicketController@cancel');
    Route::get('/user/tickets/print/{id}', 'TicketController@print');
    Route::view('/user/profile', 'user.edit-profile')->name('profile');
    Route::patch('/user/profile/update/{id}', 'Admin\ProfileController@update');
    Route::view('/user/password/edit', 'user.edit-password')->name('password.edit');
});