<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::namespace('Dashboard')
    ->prefix('dashboard')
    ->name('dashboard.')
    // ->middleware("auth")
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('conversations', 'ConversationController@index')->name('conversations');
        Route::get('conversations/{id}', 'ConversationController@edit')->name('message');
        Route::get('profile', 'EditDoctorController@edit')->name('profile');
        Route::get('reviews', 'ReviewController@index')->name('reviews');
        Route::get('subscriptions', 'SubscriptionsController@index')->name('subscriptions');
    });

Route::namespace('Guest')
    ->name('guest.')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('search', 'SearchController@index')->name('search');
        Route::get('service', 'ServiceController@index')->name('service');
        Route::get('doctors/{id}', 'DoctorController@show')->name('doctors');
    });
