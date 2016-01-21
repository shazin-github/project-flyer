<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




 

 //Route::get('flyer/{zip}/{street}' , 'flyerController@show');

 



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    

   
    
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::resource('flyer' , 'flyerController');

	Route::post('flyer/{zip}/{street}/photos' , 'flyerController@AddPhoto');

	Route::post('flyer/store' , 'flyerController@store');

    Route::post('/logout' , 'AuthController@getLogout');

    Route::get('flyer/{zip}/{street}' , 'flyerController@show');

    Route::get('/home' ,'flyerController@index');

	Route::get('flyer/create' , 'flyerController@create');

	Route::get('test' , 'HomeController@index');
   
});
