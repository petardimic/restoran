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

Route::get('/', function () {
    return View::make('index');
});

Route::get('/cook', function () {
    return View::make('cook');
});
Route::get('/director', function () {
    return View::make('director');
});
Route::get('/officiant', function () {
    return View::make('officiant');
});

Route::get('menu/{id}', 'MenuController@query');

Route::post('menu', 'MenuController@save');

Route::delete('menu/{id}', 'MenuController@delete');

Route::get('product', 'ProductController@query');

Route::get('restoraunt', 'RestorauntController@query');

Route::post('order', 'OrderController@save');

Route::get('order', 'OrderController@query');


Route::any('login', 'UserController@login');

Route::any('logout', 'UserController@logout');
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
