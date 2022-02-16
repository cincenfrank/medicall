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




// TODO create a namespace and evaluate if it's better to separate logic between filter and search
Route::get('filter', 'Api\SearchController@getFilterList');
Route::get('filter/services', 'Api\SearchController@getFilteredServices');
Route::get('filter/doctors', 'Api\SearchController@getFilteredDoctors');
Route::get('filter/doctors/{id}', 'Api\SearchController@getDoctorById');
Route::get('filter/services/{id}', 'Api\SearchController@getServiceById');

Route::get("service/{id}", "Api\ServiceController@getServiceData");
Route::get("reviews", "Api\ReviewController@getReviewData");

Route::get("/messages/doctor/{id}", "Api\MessageController@getDoctorMessages");

