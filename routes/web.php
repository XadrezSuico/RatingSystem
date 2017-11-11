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

Route::get('/', function () {
    return view('system.index');
});

Route::group(["prefix" => "settings"],function () {
  Route::group(["prefix" => "country"],function () {
    Route::get('/', "CountryController@index");
    Route::get('/new', "CountryController@new");
    Route::post('/new', "CountryController@new_post");
    Route::get('/edit/{id}', "CountryController@edit");
    Route::post('/edit/{id}', "CountryController@edit_post");
    Route::get('/delete/{id}', "CountryController@delete");
  });

  Route::group(["prefix" => "state"],function () {
    Route::get('/', "StateController@index");
    Route::get('/new', "StateController@new");
    Route::post('/new', "StateController@new_post");
    Route::get('/edit/{id}', "StateController@edit");
    Route::post('/edit/{id}', "StateController@edit_post");
    Route::get('/delete/{id}', "StateController@delete");
    Route::get('/api/listByCountry/{id}', "StateController@api_listByCountry");
    Route::get('/api/listByCountry', "StateController@api_listNothing");
  });

  Route::group(["prefix" => "city"],function () {
    Route::get('/', "CityController@index");
    Route::get('/new', "CityController@new");
    Route::post('/new', "CityController@new_post");
    Route::get('/edit/{id}', "CityController@edit");
    Route::post('/edit/{id}', "CityController@edit_post");
    Route::get('/delete/{id}', "CityController@delete");
  });


  Route::group(["prefix" => "federation"],function () { 
    Route::get('/', "FederationController@index");
    Route::get('/new', "FederationController@new");
    Route::post('/new', "FederationController@new_post");
    Route::get('/edit/{id}', "FederationController@edit");
    Route::post('/edit/{id}', "FederationController@edit_post");
    Route::get('/delete/{id}', "FederationController@delete");
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
