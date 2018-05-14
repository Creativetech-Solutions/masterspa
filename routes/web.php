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
Route::get('/admin', 'admin\HomeController@index');
Route::get('/admin/registration/reg-list', 'admin\flightsController@index');

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
Route::post('/submission', 'HomeController@submission');

//admin routes
Route::group( ['prefix' => 'admin', 'namespace' => 'admin','middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@index');
    Route::get('/registrations', 'RegistrationController@index');
    Route::get('/createReport', 'ReportController@index');
    Route::post('/report/defaultCheckboxes', 'ReportController@saveDefultCheckboxes');
    Route::post('/report/defaultCheckboxesAndSave', 'ReportController@saveAndExport');
    Route::post('/user/update/{id}', 'UserController@update');

    // get routes
    Route::get('/profile','HomeController@getprofile');
    Route::get('/user', 'UserController@index');
    Route::get('/guests', 'AttendeeController@index');
    Route::get('/registration/edit_form/{id}','RegistrationController@getregister');
    Route::get('/report/excel','ReportController@excel');


    // post routes
    Route::post('/profile','HomeController@getprofile');
    Route::post('/registration/edit_form/{id}','RegistrationController@getregister');
    Route::post('/report/excel','ReportController@excel');

});

