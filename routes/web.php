<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteGroup;
use Admin\UserController;
use Admin\TourController;
use Admin\TicketController;
use Admin\QueryController;
use Illuminate\Support\Facades\URL;

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
if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}

Route::get('/', 'HomeController@home');

Route::middleware(['auth','verified'])->name('home')->group(function (){
    Route::get('dashboard','HomeController@index');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth','verified','auth.isAdmin'])->name('admin.')->group(function (){

    Route::resource('/users', UserController::class);
    Route::resource('/tours', TourController::class);
    Route::resource('/tickets', TicketController::class);
    Route::post('/tickets/cancel/{id}', 'Admin\TicketController@cancel');
    Route::view('/profile', 'admin.edit-profile')->name('profile');
    Route::patch('/profile/update/{id}', 'Admin\ProfileController@update');
    Route::view('/password/edit', 'admin.edit-password')->name('password.edit');
    Route::get('/queries', 'Admin\QueryController@viewQuery');
    Route::get('/new-query', 'Admin\QueryController@newQuery');
    Route::patch('/query/accept/{id}', 'Admin\QueryController@acceptQuery');
    Route::get('/openQuery/{id}', 'Admin\QueryController@openQuery');
    Route::post('/sendMsg/{chat_instance_id}', 'Admin\QueryController@sendMsg');
    Route::patch('/query/close/{id}', 'Admin\QueryController@closeQuery');
});
// User Routes
Route::middleware(['auth','verified'])->name('user.')->group(function (){
    Route::get('/book', 'BookingController@index');
    Route::get('/book/ticket/{id}', 'BookingController@ticket');
    Route::post('/book/store/{user_id}/{tour_id}', 'BookingController@store');
    Route::get('/tickets', 'TicketController@index');
    Route::post('/tickets/cancel/{id}', 'TicketController@cancel');
    Route::get('/tickets/print/{id}', 'TicketController@print');
    Route::view('/profile', 'user.edit-profile')->name('profile');
    Route::patch('/profile/update/{id}', 'Admin\ProfileController@update');
    Route::view('/password/edit', 'user.edit-password')->name('password.edit');
    Route::resource('/chat', ChatController::class);
    Route::post('/chat/send/{chat_instance_id}', 'ChatController@sendMsg');
});