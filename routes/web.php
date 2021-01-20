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
    return view('auth.login');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/processor', 'ProcessorController');
Route::resource('/farmer_influencer', 'AggregatorController')->names('aggregator');
Route::resource('/delivery', 'DeliveryController');
Route::resource('/pricing', 'PricingController');
Route::resource('/logisticsCompany', 'LogisticsCompanyController');
Route::resource('/order', 'ProcessorOrderController');
Route::get('/pricing/aggregator/{id}', 'PricingController@getAggregatorByOrder');
Route::resource('/logistics', 'LogisticsController');
Route::get('/logistics/order/{id}', 'LogisticsController@getLogisticsDetail');
Route::resource('/farmer', 'FarmerController');
Route::resource('/aggregatorPayment', 'AggregatorPaymentController');
Route::get('/report', 'ReportController@getFarmerInfluencerPricingReport');
Route::get('/home', 'HomeController@index')->name('home');
