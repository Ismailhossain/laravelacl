<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return View('layouts.master');
});


Auth::routes();

Route::get('/home', 'HomeController@index');




// User ROUTES
Route::get('user/create', [
    'middleware' => ['roles:administrator'],
//    'middleware' => ['permissions:can_edit'],

    'uses' => 'UserController@create',
]);

Route::post('user/store', array('uses' => 'UserController@store'));
Route::get('user/show', array('uses' => 'UserController@show'));
Route::get('user/edit/{id}', array('uses' => 'UserController@edit'));
Route::post('user/update', array('uses' => 'UserController@update'));
Route::get('user/destroy/{id}', array('uses' => 'UserController@destroy'));




// ACL ROUTES

//Route::get('acl/create', array('uses' => 'AclController@create'));
//Route::post('acl/store', array('uses' => 'AclController@store'));
Route::get('acl/show', array('uses' => 'AclController@show'));
Route::get('acl/edit/{id}', array('uses' => 'AclController@edit'));
Route::post('acl/update', array('uses' => 'AclController@update'));
//Route::get('acl/destroy/{id}', array('uses' => 'AclController@destroy'));



// End of ACL Routes







// Error Routes

Route::get('/404', function () {
    return view('404');
});




