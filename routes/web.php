<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'EventController@index')->name('home');
Route::get('/user_event_registration/{id}', 'HomeController@user_event_registration')->name('user_event_registration');
Route::get('/user_view_event/{id}/{id2}', 'HomeController@event_registration')->name('user_view_event');
Route::post('/user_view_event/{id}', 'HomeController@register_for_event')->name('event_registration');
Route::get('/dashboard', 'AdminController@editevent')->name('dashboard');
Route::get('/view/latestEvent/{id}', 'EventController@view_l')->name('view_l_event');
Route::get('/view/UpcomingEvent/{id}', 'EventController@view_up')->name('view_up_event');

//slider

Route::get('/slider', 'AdminController@slider_create')->name('slider');
Route::post('/slider', 'AdminController@slider_store')->name('store_slider');
Route::get('/silder/{id}', 'AdminController@slider_edit')->name('edit_slider');
Route::post('/silder/{id}', 'AdminController@update_slider')->name('update_slider');
Route::get('/slider/{id}', 'AdminController@slider_delete')->name('delete_slider');

//description
Route::get('/description', 'AdminController@create_description')->name('description');
Route::post('/description/{id}', 'AdminController@store_description')->name('store_description');
Route::get('/about', 'EventController@about')->name('about');

//executive

Route::get('/executive', 'AdminController@create_exec')->name('executive');
Route::post('/executive', 'AdminController@store_exec')->name('store_executive');
Route::get('/edit/executive/{id}', 'AdminController@edit_exec')->name('edit_executive');
Route::post('/executive/{id}', 'AdminController@update_slider_exec')->name('update_executive');
Route::get('/executive/{id}', 'AdminController@delete_exec')->name('delete_executive');

// latest event

Route::get('/latest_event', 'AdminController@latest_event_create')->name('latest_event');
Route::post('/latest_event', 'AdminController@latest_event_store')->name('store_latest_event');
Route::get('/all_event', 'LatestEventController@all')->name('all_event');
Route::get('/all_event/{id}', 'AdminController@latest_event_edit')->name('edit_event');
Route::post('/all_event/{id}', 'AdminController@update_latest_event')->name('update_event');
Route::get('/event/{e_id}/image/{i_id}', 'AdminController@latest_event_delete_image')->name('delete_event_image');

//upcoming Event

Route::get('/upcoming_event', 'AdminController@upcoming_create')->name('upcoming_event');
Route::post('/upcoming_event', 'AdminController@upcoming_store')->name('store_upcoming_event');
Route::get('/upcoming_event/edit/{id}', 'AdminController@upcoming_edit')->name('edit_upcoming_event');
Route::post('/upcoming_event/{id}', 'AdminController@update_upcoming_event')->name('update_upcoming_event');
Route::delete('/upcoming_event/{id}', 'AdminController@upcoming_delete')->name('delete_upcoming_event');
Auth::routes();

//for User Login and registration
Route::get('/home', 'HomeController@index')->name('homelogin');
Route::get('/reqruitment/{id}', 'HomeController@userreqruitment')->name('reqruitment');
Route::post('/reqruitment/{id}', 'HomeController@reqruitment')->name('userreqruitment');
Route::get('/recruitmenthome', 'RecruitmentController@index')->name('recruitmenthomepage');

//For post and comment:
Route::get('/realtime/create', 'PostController@create')->name('create');
Route::post('/realtime/index', 'PostController@store')->name('store');
Route::get('/realtime/index', 'PostController@index')->name('index');
Route::get('/realtime/show/{post_id}', 'PostController@show')->name('show');
Route::delete('/realtime/show/{id}', 'PostController@delete')->name('delete_own_post');
Route::post('/realtime/comments', 'CommentController@store')->name('comments');
Route::get('/report_post/{id}', 'PostController@report')->name('report_one');
Route::post('/report_post/{id}', 'PostController@report_post')->name('report_two');



//For Admin Login
Route::get('/adminhome', 'AdminController@adminindex')->name('adminhome');
Route::get('/adminlogin', 'Auth\AdminLoginController@showLoginForm')->name('adminlogin');
Route::post('/adminhome', 'Auth\AdminLoginController@login')->name('admindashboard');
Route::get('/editdata', 'AdminController@editindex')->name('editdata');
Route::get('/editdata/{id}', 'AdminController@edituserjobdata')->name('edituserjobdata');
Route::delete('/editdata/{id}', 'AdminController@delete_user')->name('delete_user');
Route::post('/edituserdesignation/{id}', 'AdminController@update_user')->name('updateuser');
Route::get('/edit_user_event_one', 'AdminController@show_reg_record')->name('edit_records_one');
Route::get('/edit_user_event_one/{id}', 'AdminController@view_user_event_registrations')->name('edit_records_two');
Route::post('/edit_user_event_two/{reg_id}', 'AdminController@update_user_registrations')->name('edit_records_three');
Route::get('/edit_posts', 'AdminController@editpost')->name('edit_posts');
Route::delete('/edit_posts/{id}', 'AdminController@delete_post')->name('delete_posts');

Route::get('/About', function () {
    return view('About');
});
