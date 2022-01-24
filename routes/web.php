<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;
use Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Admin\TourController;

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
    return view('index');
});
Route::middleware(['auth','verified'])->name('home')->group(function (){
    Route::get('dashboard','HomeController@index');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth','verified','auth.Role'])->name('admin.')->group(function (){
    Route::resource('/users', UserController::class);
    Route::resource('/tours', TourController::class);
    // Route::resource('/tickets', TicketsController::class);
});
// User Routes
Route::prefix('user')->middleware(['auth','verified','auth.Role'])->name('user.')->group(function (){
    Route::view('/dashboard', 'user.dashboard');
});