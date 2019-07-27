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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
    });
});

//Back-end Controller
Route::resource('backend/courses','backend\CoursesController');
Route::resource('backend/batches','backend\BatchesController');
Route::resource('backend/users','backend\UsersController');


//Front-end Controller
Route::resource('courses/enroll','EnrollController');
Route::get('status','HomeController@check_status');
Route::get('pdfreport/{id}/print','HomeController@pdfreport');