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
  return redirect("/home");
});
Route::get('/home', function () {
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




Route::group(["prefix" => "type"],function () { 
  Route::get('/', "TypeController@index");
  Route::get('/new', "TypeController@new");
  Route::post('/new', "TypeController@new_post");
  Route::get('/edit/{id}', "TypeController@edit");
  Route::post('/edit/{id}', "TypeController@edit_post");
  Route::get('/delete/{id}', "TypeController@delete");
});


Route::group(["prefix" => "ratingtype"],function () { 
  Route::get('/', "RatingTypeController@index");
  Route::get('/new', "RatingTypeController@new");
  Route::post('/new', "RatingTypeController@new_post");
  Route::get('/edit/{id}', "RatingTypeController@edit");
  Route::post('/edit/{id}', "RatingTypeController@edit_post");
  Route::get('/delete/{id}', "RatingTypeController@delete");
});


Route::group(["prefix" => "person"],function () { 
  Route::get('/', "PersonController@index");
  Route::get('/new', "PersonController@new");
  Route::post('/new', "PersonController@new_post");
  Route::get('/edit/{id}', "PersonController@edit");
  Route::post('/edit/{id}', "PersonController@edit_post");
  Route::get('/delete/{id}', "PersonController@delete");
});

Auth::routes();
