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

/*
|
| Comment code is not error code, these are different example of 
| using dependancy injection
|
*/

interface Barinterface {}

class Baz {}

class Bar implements Barinterface {

    // public $bar;

    // public function __construct()
    // {

    //     $this->bar = new Baz;

    // }
}


class secondBar implements Barinterface {}

app()->bind('Barinterface' , 'Bar');

Route::get('bar' , function(){

    /** 
    *
    * Three Different Way to access binding object
    *
    */
    
    // 1- $bar = app()->make('Barinterface');
    
    // 2- $bar = app()['Barinterface']; 
    
    // 3-

    $bar = app('Barinterface'); 

    return $bar;

});


// Route::get('bar' , function(Barinterface $bar){

//     dd($bar);

// });


 



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


Route::group(['middleware' => 'web'], function () {
    
    Route::auth();

    Route::resource('flyer' , 'flyerController');

	Route::post('flyer/{zip}/{street}/photos' , 'flyerController@AddPhoto');

	Route::post('flyer/store' , 'flyerController@store');

    Route::post('/logout' , 'AuthController@getLogout');

    Route::get('flyer/{zip}/{street}' , 'flyerController@show');

    Route::get('/' ,'HomeController@index');

	Route::get('flyer/create' , 'flyerController@create');

	Route::get('test' , 'TestController@TestingRepository');

    Route::get('Foo-test' , 'TestController@fooRepository');

    Route::get('TestServiceProvider' , 'TestController@index');
   
});
