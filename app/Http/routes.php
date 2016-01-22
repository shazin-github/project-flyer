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

interface Barinterface {}

class Baz {}

class Bar implements Barinterface {

    // public $bar;

    // public function __construct()
    // {

    //     $this->bar = new Baz;

    // }
}

// App::bind('Bar',function(){

//     //dd('fatching');

//     return (new Bar(new Baz));
// });

class secondBar implements Barinterface {}

// App::bind('Barinterface',function(){

//     //dd('fatching');

//     return new Bar;

// });

app()->bind('Barinterface' , 'Bar');

Route::get('bar' , function(){

    /** 
    *
    * Three Different Way to access binding object
    *
    */
    
    //$bar = app()->make('Barinterface');
    
    //$bar = app()['Barinterface'];
    
    $bar = app('Barinterface');

    dd($bar);

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
