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

// Route::get('/producten', function () {
//     return view('Producten.productdesign');
// });

// Route::get('/productinfo', function () {
//     return view('Producten.productinfo');
// });



//Controller testen met producten toevoegen in wikelwagen
Route::get('/producten', 'ProductController@index');
Route::get('/producten/{id}/productinfo', 'ProductController@show');
 
// Route::get('winkelwagen', 'WinkelWagenController@cart');
 
Route::get('add-to-cart/{id}', 'WinkelWagenController@store');
Route::get('/winkelwagen', ['middleware' => 'auth', 'uses' => 'WinkelWagenController@show']);
Route::get('/winkelwagen/destroy/{product}/{aantal}', 'WinkelWagenController@destroy');
Route::get('/winkelwagen/update/{product}/{aantal}', 'WinkelWagenController@update');



//winkelwagen store
// Route::get('/overzicht/addItem/{product}/', 'CartController@store');
