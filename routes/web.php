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
// get method
Route::get('/', 'HomeController@index')->name('home');
Route::get('/additional', 'HomeController@getadditional');
Route::get('/agreement', 'HomeController@getagreement');
Route::get('/guests', 'HomeController@getguests');
Route::get('/hotel', 'HomeController@gethotel');
Route::get('/meeting', 'HomeController@getmeeting');
Route::get('/prefrences', 'HomeController@getprefrences');
Route::get('/contact_us', 'HomeController@getcontactus');
Route::get('/flights', 'HomeController@getflights');

// post methods

Route::post('/prefrences', 'HomeController@getprefrences');
Route::post('/guests', 'HomeController@getguests');
Route::post('/', 'HomeController@index')->name('home');
Route::post('/additional', 'HomeController@getadditional');
Route::post('/agreement', 'HomeController@getagreement');
Route::post('/hotel', 'HomeController@gethotel');
Route::post('/meeting', 'HomeController@getmeeting');
Route::post('/contact_us', 'HomeController@getcontactus');
Route::post('/flights', 'HomeController@getflights');