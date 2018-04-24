<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/additional', 'HomeController@getadditional');
Route::get('/agreement', 'HomeController@getagreement');
Route::get('/guests', 'HomeController@getguests');
Route::get('/hotel', 'HomeController@gethotel');
Route::get('/meeting', 'HomeController@getmeeting');
Route::get('/prefrences', 'HomeController@getprefrences');
Route::get('/contact_us', 'HomeController@getcontactus');
Route::get('/flights', 'HomeController@getflights');
