<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/winkelwagen', function () {
    return view('winkelwagen');
});

Route::get('/testhome', function () {
    return view('testhome');
});

// Route::get('/producten', function () {
//     return view('Producten.productdesign');
// });

// Route::get('/productinfo', function () {
//     return view('Producten.productinfo');
// });



//producten routes
Route::get('/producten', 'ProductController@index');
Route::get('/producten/{id}/productinfo', 'ProductController@show');
Route::get('/addproduct', function () {
    return view('Producten.addproduct');
});



//winkelwagen routes 
Route::get('add-to-cart/{id}', 'WinkelWagenController@store');
Route::get('/winkelwagen', ['middleware' => 'auth', 'uses' => 'WinkelWagenController@show']);
Route::get('/winkelwagen/destroy/{product}/{aantal}', 'WinkelWagenController@destroy');
Route::get('/winkelwagen/update/{product}/{aantal}', 'WinkelWagenController@update');
Route::get('/winkelwagen/bestel', 'WinkelWagenController@sendmail');

//leverancier routes
Route::get('/leveranciers', 'LeverancierController@index');
Route::get('/leveranciers/{id}', 'LeverancierController@show');

//Bestelling Historie routes
Route::get('/bestelling/geschiedenis', 'BestellingHistorieController@index');
Route::get('/bestelling/geschiedenis/info', 'BestellingHistorieController@show');

//winkelwagen store
// Route::get('/overzicht/addItem/{product}/', 'CartController@store');

//user(profiel) routes 
Route::get('/profiel', function () {
    return view('users.profile');
});