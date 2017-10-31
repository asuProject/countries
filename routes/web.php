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

/**********************************************************************************************/


/**********************/
/**
 * Country & Towns routes
 */
Route::resource('country/country', 'Country\CountryController', ['names' => 'country.country']);
Route::post('/town/ajax_get','Country\TownController@')->name('town.ajax.get');
Route::resource('country/town', 'Country\TownController', ['names' => 'country.town']);
/**********************/
