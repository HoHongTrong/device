<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
  //------- Category -------------------
  Route::group(['prefix' => 'category'], function () {
    Route::get('list', 'CategoryController@getList');

    Route::get('edit/{id}', 'CategoryController@getEdit');
    Route::post('edit/{id}', 'CategoryController@postEdit');

    Route::get('add', 'CategoryController@getAdd');
    Route::post('add', 'CategoryController@postAdd');

    Route::get('delete/{id}', 'CategoryController@getDelete');
  });
  //------- Bills -------------------
  Route::group(['prefix' => 'bills'], function () {
    Route::get('list', 'BillsController@getList');

    Route::get('edit/{id}', 'BillsController@getEdit');
    Route::post('edit/{id}', 'BillsController@postEdit');

    Route::get('add', 'BillsController@getAdd');
    Route::post('add', 'BillsController@postAdd');

    Route::get('delete/{id}', 'BillsController@getDelete');
  });
  //------- Products -------------------
  Route::group(['prefix' => 'products'], function () {
    Route::get('list', 'ProductsController@getList');

    Route::get('edit/{id}', 'ProductsController@getEdit');
    Route::post('edit/{id}', 'ProductsController@postEdit');

    Route::get('add', 'ProductsController@getAdd');
    Route::post('add', 'ProductsController@postAdd');

    Route::get('delete/{id}', 'ProductsController@getDelete');
  });
  //------- Slide -------------------
  Route::group(['prefix' => 'slide'], function () {
    Route::get('list', 'SlideController@getList');

    Route::get('edit/{id}', 'SlideController@getEdit');
    Route::post('edit/{id}', 'SlideController@postEdit');

    Route::get('add', 'SlideController@getAdd');
    Route::post('add', 'SlideController@postAdd');

    Route::get('delete/{id}', 'SlideController@getDelete');
  });
  
  Route::group(['prefix' => 'user'], function () {
    Route::get('list', 'UserController@getList');

    Route::get('edit/{id}', 'UserController@getEdit');
    Route::post('edit/{id}', 'UserController@postEdit');

    Route::get('add', 'UserController@getAdd');
    Route::post('add', 'UserController@postAdd');

    Route::get('delete/{id}', 'UserController@getDelete');

  });
});