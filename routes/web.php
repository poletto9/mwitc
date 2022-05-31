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

// หน้าสมัครสมาชิก พร้อมดึงข้อมูล จังหวัด อำเภอ ตำบล ไปรษณีย์
Route::get('/register','Auth\RegisterController@index');

// บันทึกการสมัครสมาชิก
Route::post('/register','Auth\RegisterController@create');

//Ajax หน้า register
Route::post('/register/amphures','Auth\RegisterController@fetch_amphures')->name('dropdown.amphures');
Route::post('/register/districts','Auth\RegisterController@fetch_districts')->name('dropdown.districts');
Route::post('/register/zipcodes','Auth\RegisterController@fetch_zipcodes')->name('dropdown.zipcodes');

// แสดงหน้าแรกของ front-end
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
Route::resource('backend/enrolls','backend\EnrollsController');
Route::post('backend/enrolls/{id}/detail','backend\EnrollsController@detail');


//Front-end Controller
Route::resource('courses/enroll','EnrollController');
Route::get('status','HomeController@check_status');
Route::get('pdfreport/{id}/print','HomeController@pdfreport');
Route::get('outline/{id}','HomeController@outline');

//edit user data
Route::get('user/edit','Auth\EditUserController@display_edit_user');
Route::post('user/edit','Auth\EditUserController@update_user_data');
//Ajax หน้าแก้ไขข้อมูลส่วนตัว
Route::post('user/edit/amphures','Auth\EditUserController@fetch_amphures')->name('dropdown.amphures');
Route::post('user/edit/districts','Auth\EditUserController@fetch_districts')->name('dropdown.districts');
Route::post('user/edit/zipcodes','Auth\EditUserController@fetch_zipcodes')->name('dropdown.zipcodes');



Route::get('forgot_password','Auth\ForgotPasswordController@index');
Route::post('password_reset','Auth\ForgotPasswordController@search');
Route::post('reset_complete','Auth\ResetPasswordController@index');
