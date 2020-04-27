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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/rooms', 'RoomController@store');

Route::post('/clubs', 'UserController@storeClub');

Route::post('/mods', 'UserController@storeMod');

Route::get('/Clublogin', 'UserController@ClubLogin');

Route::get('/ClubHome', 'UserController@ClubHome');

Route::get('/rooms', 'RoomController@showEmptyRooms');

Route::get('/reservations/create', 'ReservationController@create');

Route::post('/reservations/{dateStart}/{dateFinish}/{id_room}/store', 'ReservationController@store');

Route::get('/reservations/myReservations', 'ReservationController@indexMyResevations');


// Route::get('/rooms', 'RoomController@index');

// Route::get('/login', function(){

// 	if (Auth::check()) {
// 		return redirect('/ClubHome');	
// 	} else {
// 		return view('/auth/login');
// 	}
	
// 	}
// );