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
Route::get('/payment', 'HomeController@getagreement');
Route::get('/guests', 'HomeController@getguests');
Route::get('/hotel', 'HomeController@gethotel');
Route::get('/meeting', 'HomeController@getmeeting');
Route::get('/prefrences', 'HomeController@getprefrences');
Route::get('/contact_us', 'HomeController@getcontactus');
Route::get('/flights', 'HomeController@getflights');
Route::get('/terms_and_condition', 'HomeController@termsAndCondition');
Route::get('/admin', 'admin\HomeController@index');
Route::get('/admin/registration/reg-list', 'admin\flightsController@index');
Route::any('/search','HomeController@searchResult');

// post methods
Route::post('/complete_payment','HomeController@completePayment');
Route::post('/cancel_payment/{id}','HomeController@cancelPayment');
Route::post('/complete_later', 'HomeController@saveAndCompleteLater');
Route::post('/prefrences', 'HomeController@getprefrences');
Route::post('/guests', 'HomeController@getguests');
Route::post('/', 'HomeController@index')->name('home');
Route::post('/additional', 'HomeController@getadditional');
Route::post('/payment', 'HomeController@getagreement');
Route::post('/hotel', 'HomeController@gethotel');
Route::post('/meeting', 'HomeController@getmeeting');
Route::post('/contact_us', 'HomeController@getcontactus');
Route::post('/flights', 'HomeController@getflights');
Route::post('/submission', 'HomeController@submission');



//admin routes
Route::group( ['prefix' => 'admin', 'namespace' => 'admin','middleware' => 'auth'], function (){
    Route::get('/dashboard', 'HomeController@index');
    Route::get('/registrations', 'RegistrationController@index');
    Route::get('/createReport', 'ReportController@index');
    Route::get('/saveReport', 'ReportController@savedReports');
    Route::post('/report/defaultCheckboxes', 'ReportController@saveDefultCheckboxes');
    Route::post('/report/defaultCheckboxesAndSave', 'ReportController@saveAndExport');
    Route::post('/user/update/{id}', 'UserController@update');

    // get routes
    Route::get('/emails', 'EmailController@index');
    Route::get('/profile','HomeController@getprofile');
    Route::get('/user', 'UserController@index');
    Route::get('/guests_flight/{id}', 'AttendeeController@getGuestFlight');
    Route::get('/guests', 'AttendeeController@index');
    //Route::get('/guests_flight', 'AttendeeController@index');
    Route::get('/guests/edit_guest/{id}', 'AttendeeController@editAttendee');
    Route::get('/guests/get_guest_flight/{id}', 'AttendeeController@getGuestFlightData');
    Route::post('/guests/add_guest_flight/{id}', 'AttendeeController@addGuestFlight');
    Route::get('/guests/delete/{id}', 'AttendeeController@delete');
    Route::get('/guests/guest_delete/{id}', 'AttendeeController@deleteGuestFlight');
    Route::get('/emails/edit_template/{id}','EmailController@getTemplate');
    Route::get('/registration/edit_form/{id}','RegistrationController@getregister');
    Route::get('/registration/delete/{id}','RegistrationController@delete');
    Route::get('/report/download_single/{id}','ReportController@downloadSingleReport');
    Route::get('/report/download_default/{id}','ReportController@downloadDefaultReport');


    // post routes
    Route::post('/emails', 'EmailController@index');
    Route::post('/profile','HomeController@getprofile');
    Route::post('/guests/edit_guest_flight/{id}', 'AttendeeController@editGuestFlight');
    Route::post('/registration/edit_form/{id}','RegistrationController@getregister');
    Route::post('/emails/update/{id}','EmailController@updateTemplate');
    Route::post('/report/defaultreport','ReportController@defaultReport');
    Route::post('/guests/edit_guest/{id}', 'AttendeeController@editAttendee');
    Route::post('/report/singleReport','ReportController@singleReport');
});

