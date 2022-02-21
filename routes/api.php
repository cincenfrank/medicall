<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/doctors/sponsored', 'Api\DoctorController@getSponsoredDoctors');

Route::get('doctor/{id}','Api\DoctorController@fetchReviews')->name('fetchReviews');





// TODO create a namespace and evaluate if it's better to separate logic between filter and search
Route::get('filter', 'Api\SearchController@getFilterList');
Route::get('filter/services', 'Api\SearchController@getFilteredServices');
Route::get('filter/doctors', 'Api\SearchController@getFilteredDoctors');
Route::get('filter/doctors/{slug}', 'Api\SearchController@getDoctorById');
Route::get('filter/services/{slug}', 'Api\SearchController@getServiceById');

Route::get("service/{id}", "Api\ServiceController@getServiceData");

// xxxx 
Route::get("service/{id}/doctors", "Api\ServiceController@serviceDoctorsData");


Route::get("reviews", "Api\ReviewController@getReviewData");


// Route::get("/messages/doctor/{id}", "Api\MessageController@getDoctorMessages");
// Route::get("/message/{message_id}/doctor/{doctor_id}", "Api\MessageController@getSingleMessage");

Route::get("reviews/dashboard/{id}", "Api\ReviewController@dashReviewData");



