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

//Group routes to go through auth & verified middlewares
Route::middleware(['auth', 'verified'])->group(function (){

    //Home page
    // Route::view('/home', 'home')->name('home');

    //Edit profile page
    Route::view('/profile/edit', 'profile.edit-profile')->name('profile.edit');

    //Edit password page
    Route::view('/password/edit', 'profile.edit-password')->name('password.edit');

    Route::view('/tickets', 'user.ticket')->name('user.ticket');
    Route::view('/book', 'user.book')->name('user.book');
    Route::view('/contact', 'user.contact')->name('user.contact');

    Route::view('/admin/package', 'admin.package')->name('admin.package');
    Route::view('/admin/tickets', 'admin.tickets')->name('admin.tickets');
    Route::view('/admin/requests', 'admin.requests')->name('admin.requests');
    Route::view('/admin/users', 'admin.users')->name('admin.users');

    Route::view('/admin/sidebar', 'admin.sidebar')->name('admin.sidebar');



    //Toggle two factor authentication page
    Route::view('/two-factor-authentication/toggle', 'profile.toggle-two-factor-authentication')->name('two-factor-authentication.toggle');
});

//Send two factor recovery codes email
Route::post('/user/two-factor-recovery-codes/email', 'App\Http\Controllers\EmailController@sendTwoFactorRecoveryCodes')->name('two-factor-recovery-codes.send');

Route::get('dashboard','App\Http\Controllers\HomeController@index');