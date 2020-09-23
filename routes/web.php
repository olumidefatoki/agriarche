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
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/buyer', 'BuyerController');
Route::resource('/aggregator', 'AggregatorController');
Route::resource('/delivery', 'DeliveryController');
Route::resource('/mapping', 'OrderMappingController');
Route::resource('/logisticsCompany', 'LogisticsCompanyController');

Route::group(['prefix' => '/logistics'], function () {
    Route::get('/', 'LogisticsController@index')->name('logistics.index');
    Route::get('/create', 'LogisticsController@create')->name('logistics.create');
    Route::get('/{logistics}', 'LogisticsController@show')->name('logistics.show');
    Route::post('/store', 'LogisticsController@store')->name('logistics.store');
});
Route::group(['prefix' => '/order'], function () {
    Route::get('/', 'BuyerOrderController@index')->name('order.index');
    Route::get('/create', 'BuyerOrderController@create')->name('order.create');
    Route::get('/{buyerOrder}', 'BuyerOrderController@show')->name('order.show');
    Route::post('/store', 'BuyerOrderController@store')->name('order.store');
});

/*Route::get('/buyer/', 'BuyerController@index')->name('buyer.index');
Route::get('/buyer/create', 'BuyerController@create')->name('buyer.create');
Route::post('/buyer/store', 'BuyerController@store')->name('buyer.store');
Route::get('/buyer/{id}', 'BuyerController@show')->name('buyer.show');


Route::group(['prefix' => 'aggregator'], function () {
    Route::get('/', 'AggregatorController@index')->name('aggregator.index');
    Route::get('/create', 'AggregatorController@create')->name('aggregator.create');
    Route::get('/{id}', 'AggregatorController@show')->name('aggregator.show');
    Route::post('/store', 'AggregatorController@store')->name('aggregator.store');
});
*/
