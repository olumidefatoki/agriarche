<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', 'BuyerController@index')->name('dashboard');

Route::resource('/buyer', 'BuyerController');
Route::resource('/aggregator', 'AggregatorController');
Route::resource('/delivery', 'DeliveryController');
Route::resource('/mapping', 'OrderMappingController');
Route::resource('/logisticsCompany', 'LogisticsCompanyController');
Route::resource('/order', 'BuyerOrderController');
Route::get('/mapping/aggregator/{id}', 'OrderMappingController@getAggregatorByOrder');
Route::resource('/logistics', 'LogisticsController');
Route::get('/logistics/order/{id}', 'LogisticsController@getLogisticsDetail');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
