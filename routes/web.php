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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/denied', 'HomeController@denied')->name('denied');





Route::group(['prefix' => '/', 'middleware'=>['admin']], function() {

Route::get('admin', ['as' => 'all_camps', 'uses' => 'CampController@manage_camps']);

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('add_camp', ['as' => 'add_camp', 'uses' => 'CampController@add_camp']);
Route::post('add_camp', ['as' => 'add_camp', 'uses' => 'CampController@add_camp_save']);
Route::get('view_camp/{i}', ['as' => 'view_camp', 'uses' => 'CampController@view_camp']);
Route::post('view_camp/{id}', ['as' => 'view_camp', 'uses' => 'CampController@show_camp_update']);
Route::get('publish_camp/{id}', ['as' => 'publish_camp', 'uses' => 'CampController@publish_camp']);
Route::get('delete_camp/{id}', ['as' => 'delete_camp', 'uses' => 'CampController@delete_camp']);
Route::get('all_camps', ['as' => 'all_camps', 'uses' => 'CampController@manage_camps']);
Route::get('delete_img/{id}', ['as' => 'delete_img', 'uses' => 'CampController@delete_img']);
Route::post('add_img/{id}', ['as' => 'add_img', 'uses' => 'CampController@add_img']);


Route::get('add_group', ['as' => 'add_group', 'uses' => 'GroupController@add_group']);
Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'GroupController@choose_camp']);
Route::post('add_group', ['as' => 'add_group', 'uses' => 'GroupController@add_group_save']);
Route::get('view_group/{id}', ['as' => 'view_group', 'uses' => 'GroupController@view_group']);
Route::post('view_group/{id}', ['as' => 'view_group', 'uses' => 'GroupController@show_group_update']);
Route::get('publish_group/{id}', ['as' => 'publish_group', 'uses' => 'GroupController@publish_group']);
Route::get('delete_group/{id}', ['as' => 'delete_group', 'uses' => 'GroupController@delete_group']);
Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'GroupController@choose_camp']);
Route::post('choose_camp', ['as' => 'choose_camp', 'uses' => 'GroupController@manage_project']);
Route::get('all_groups/', ['as' => 'all_groups','uses' => 'GroupController@all_groups']);
Route::get('select_supervisor', ['as' => 'select_supervisor','uses' => 'GroupController@select_supervisor']);
Route::post('add_supervisor_group', ['as' => 'add_supervisor_group','uses' => 'GroupController@add_supervisor_group']);
Route::post('upload_image_group/{id}', ['as' => 'upload_image_group', 'uses' => 'GroupController@upload_image_group']);
Route::post('upload_video_group/{id}', ['as' => 'upload_video_group', 'uses' => 'GroupController@upload_video_group']);
Route::get('view_group_image/{id}', ['as' => 'view_group_image', 'uses' => 'GroupController@view_group_image']);
//Route::get('view_video/{id}', ['as' => 'view_video', 'uses' => 'GroupController@view_video']);
Route::get('delete_group_img/{id}', ['as' => 'delete_group_img', 'uses' => 'GroupController@delete_group_img']);
Route::get('delete_group_video/{id}', ['as' => 'delete_group_video', 'uses' => 'GroupController@delete_group_video']);

Route::get('delete_relation_group_supervisor/{id}', ['as' => 'delete_relation_group_supervisor', 'uses' => 'GroupController@delete_relation_group_supervisor']);










Route::get('add_kid', ['as' => 'add_kid', 'uses' => 'KidController@add_kid']);
//Route::get('choose_kid', ['as' => 'choose_kid', 'uses' => 'KidController@choose_kid']);
Route::post('add_kid', ['as' => 'add_kid', 'uses' => 'KidController@add_kid_save']);
Route::get('view_kid/{id}', ['as' => 'view_kid', 'uses' => 'KidController@view_kid']);
Route::post('view_kid/{id}', ['as' => 'view_kid', 'uses' => 'KidController@show_kid_update']);
Route::get('publish_kid/{id}', ['as' => 'publish_kid', 'uses' => 'KidController@publish_kid']);
Route::get('delete_kid/{id}', ['as' => 'delete_kid', 'uses' => 'KidController@delete_kid']);
//Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'KidController@choose_camp']);
//Route::post('choose_camp', ['as' => 'choose_camp', 'uses' => 'KidController@manage_groups']);
Route::get('all_kids', ['as' => 'all_kids','uses' => 'KidController@manage_kids']);
Route::get('select_parent', ['as' => 'select_parent','uses' => 'KidController@select_parent']);
Route::post('add_parent_kid', ['as' => 'add_parent_kid','uses' => 'KidController@add_parent_kid']);
Route::get('delete_relation_kid_parent/{id}', ['as' => 'delete_relation_kid_parent', 'uses' => 'KidController@delete_relation_kid_parent']);



Route::get('add_parent', ['as' => 'add_parent', 'uses' => 'ParentController@add_parent']);
//Route::get('choose_kid', ['as' => 'choose_kid', 'uses' => 'KidController@choose_kid']);
Route::post('add_parent', ['as' => 'add_parent', 'uses' => 'ParentController@add_parent_save']);
Route::get('view_parent/{id}', ['as' => 'view_parent', 'uses' => 'ParentController@view_parent']);
Route::post('view_parent/{id}', ['as' => 'view_parent', 'uses' => 'ParentController@show_parent_update']);
Route::get('publish_parent/{id}', ['as' => 'publish_parent', 'uses' => 'ParentController@publish_parent']);
Route::get('delete_parent/{id}', ['as' => 'delete_parent', 'uses' => 'ParentController@delete_parent']);
//Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'KidController@choose_camp']);
//Route::post('choose_camp', ['as' => 'choose_camp', 'uses' => 'KidController@manage_groups']);
Route::get('all_parents', ['as' => 'all_parents','uses' => 'ParentController@manage_parents']);


Route::get('add_supervisor', ['as' => 'add_supervisor', 'uses' => 'SupervisorController@add_supervisor']);
//Route::get('choose_kid', ['as' => 'choose_kid', 'uses' => 'KidController@choose_kid']);
Route::post('add_supervisor', ['as' => 'add_supervisor', 'uses' => 'SupervisorController@add_supervisor_save']);
Route::get('view_supervisor/{id}', ['as' => 'view_supervisor', 'uses' => 'SupervisorController@view_supervisor']);
Route::post('view_supervisor/{id}', ['as' => 'view_supervisor', 'uses' => 'SupervisorController@show_supervisor_update']);
Route::get('publish_supervisor/{id}', ['as' => 'publish_supervisor', 'uses' => 'SupervisorController@publish_supervisor']);
Route::get('delete_supervisor/{id}', ['as' => 'delete_supervisor', 'uses' => 'SupervisorController@delete_supervisor']);
//Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'KidController@choose_camp']);
//Route::post('choose_camp', ['as' => 'choose_camp', 'uses' => 'KidController@manage_groups']);
Route::get('all_supervisors', ['as' => 'all_supervisors','uses' => 'SupervisorController@manage_supervisors']);

//Route::get('users_form', ['as' => 'users_form', 'uses' => 'UsersController@users_form']);
//Route::post('users_form', ['as' => 'users_form', 'uses' => 'UsersController@users_form_save']);

//Route::get('manage_salesman/{id}', ['as' => 'manage_salesman', 'uses' => 'UsersController@manage_salesman']);
//Route::get('delete_user/{id}', ['as' => 'delete_user', 'uses' => 'UsersController@delete_user']);
Route::post('view_schedule/{id}', ['as' => 'view_schedule','uses' => 'ScheduleController@show_schedule_update']);
Route::get('add_schedule/{id}', ['as' => 'add_schedule', 'uses' => 'ScheduleController@add_schedule']);

Route::get('view_schedule/{id}', ['as' => 'view_schedule','uses' => 'ScheduleController@view_schedule']);
Route::get('publish_schedule/{id}', ['as' => 'publish_schedule', 'uses' => 'ScheduleController@publish_schedule']);
Route::get('delete_schedule/{id}', ['as' => 'delete_schedule', 'uses' => 'ScheduleController@delete_schedule']);

Route::post('add_schedule/{id}', ['as' => 'add_schedule','uses' => 'ScheduleController@add_schedule_save']);
Route::get('view_schedule_groups/{id}', ['as' => 'view_schedule_groups','uses' => 'ScheduleController@manage_schedule']);
Route::get('view_schedule_date/{id}', ['as' => 'view_schedule_date','uses' => 'ScheduleController@view_schedule_date']);
Route::get('add_period_schedule/{id}', ['as' => 'add_period_schedule','uses' => 'ScheduleController@add_period_schedule']);


 });




Route::group(['prefix' => '/', 'middleware'=>['supervisor']], function() {

Route::get('add_daily/{i}', ['as' => 'add_daily', 'uses' => 'DailyBriefController@add_daily']);

Route::get('groups_supervisor/', ['as' => 'groups_supervisor','uses' => 'SupervisorController@groups_supervisor']);
Route::get('view_group_supervisor/{id}', ['as' => 'view_group_supervisor','uses' => 'SupervisorController@view_group_supervisor']);
Route::post('upload_image_group/{id}', ['as' => 'upload_image_group', 'uses' => 'GroupController@upload_image_group']);
Route::post('upload_video_group/{id}', ['as' => 'upload_video_group', 'uses' => 'GroupController@upload_video_group']);
Route::get('view_group_image/{id}', ['as' => 'view_group_image', 'uses' => 'GroupController@view_group_image']);
//Route::get('view_video/{id}', ['as' => 'view_video', 'uses' => 'GroupController@view_video']);
Route::get('delete_group_img/{id}', ['as' => 'delete_group_img', 'uses' => 'GroupController@delete_group_img']);
Route::get('delete_group_video/{id}', ['as' => 'delete_group_video', 'uses' => 'GroupController@delete_group_video']);
Route::get('all_supervisor_kids', ['as' => 'all_supervisor_kids','uses' => 'DailyBriefController@manage_supervisor_kids']);
Route::get('view_daily_kids/{id}', ['as' => 'view_daily_kids','uses' => 'DailyBriefController@manage_daily']);

Route::post('view_daily/{i}', ['as' => 'view_daily','uses' => 'DailyBriefController@show_daily_update']);
Route::get('add_daily/{i}', ['as' => 'add_daily', 'uses' => 'DailyBriefController@add_daily']);

Route::get('view_daily/{id}', ['as' => 'view_daily','uses' => 'DailyBriefController@view_daily']);
Route::get('publish_daily/{id}', ['as' => 'publish_daily', 'uses' => 'DailyBriefController@publish_daily']);
Route::get('delete_daily/{id}', ['as' => 'delete_daily', 'uses' => 'DailyBriefController@delete_daily']);

Route::post('add_daily/{id}', ['as' => 'add_daily','uses' => 'DailyBriefController@add_daily_save']);
Route::get('supervisor', ['as' => 'groups_supervisor', 'uses' => 'SupervisorController@groups_supervisor']);


Route::post('view_schedule/{i}', ['as' => 'view_schedule','uses' => 'ScheduleController@show_schedule_update']);
Route::get('add_schedule/{i}', ['as' => 'add_schedule', 'uses' => 'ScheduleController@add_schedule']);

Route::get('view_schedule/{id}', ['as' => 'view_schedule','uses' => 'ScheduleController@view_schedule']);
Route::get('publish_schedule/{id}', ['as' => 'publish_schedule', 'uses' => 'ScheduleController@publish_schedule']);
Route::get('delete_schedule/{id}', ['as' => 'delete_schedule', 'uses' => 'ScheduleController@delete_schedule']);

Route::post('add_schedule/{id}', ['as' => 'add_schedule','uses' => 'ScheduleController@add_schedule_save']);
Route::get('view_schedule_groups/{id}', ['as' => 'view_schedule_groups','uses' => 'ScheduleController@manage_schedule']);
Route::get('view_schedule_date/{id}', ['as' => 'view_schedule_date','uses' => 'ScheduleController@view_schedule_date']);





});


//Route::get('get_api_daily/{id}', ['as' => 'get_api_daily', 'uses' => 'APIController@get_api_daily']);




// Route::group(['prefix' => '/supervisor/', 'middleware'=>['supervisor']], function() {


// //Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
// Route::get('add_camp', ['as' => 'add_camp', 'uses' => 'CampController@add_camp']);
// Route::post('add_camp', ['as' => 'add_camp', 'uses' => 'CampController@add_camp_save']);
// Route::get('view_camp/{i}', ['as' => 'view_camp', 'uses' => 'CampController@view_camp']);
// Route::post('view_camp/{id}', ['as' => 'view_camp', 'uses' => 'CampController@show_camp_update']);
// Route::get('publish_camp/{id}', ['as' => 'publish_camp', 'uses' => 'CampController@publish_camp']);
// Route::get('delete_camp/{id}', ['as' => 'delete_camp', 'uses' => 'CampController@delete_camp']);
// Route::get('all_camps', ['as' => 'all_camps', 'uses' => 'CampController@manage_camps']);
// Route::get('delete_img/{id}', ['as' => 'delete_img', 'uses' => 'CampController@delete_img']);
// Route::post('add_img/{id}', ['as' => 'add_img', 'uses' => 'CampController@add_img']);


// Route::get('add_group', ['as' => 'add_group', 'uses' => 'GroupController@add_group']);
// Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'GroupController@choose_camp']);
// Route::post('add_group', ['as' => 'add_group', 'uses' => 'GroupController@add_group_save']);
// Route::get('view_group/{id}', ['as' => 'view_group', 'uses' => 'GroupController@view_group']);
// Route::post('view_group/{id}', ['as' => 'view_group', 'uses' => 'GroupController@show_group_update']);
// Route::get('publish_group/{id}', ['as' => 'publish_group', 'uses' => 'GroupController@publish_group']);
// Route::get('delete_group/{id}', ['as' => 'delete_group', 'uses' => 'GroupController@delete_group']);
// Route::get('choose_camp', ['as' => 'choose_camp', 'uses' => 'GroupController@choose_camp']);
// Route::post('choose_camp', ['as' => 'choose_camp', 'uses' => 'GroupController@manage_groups']);
// Route::get('all_groups/{i}', ['as' => 'all_groups','uses' => 'GroupController@all_groups']);
// Route::get('select_supervisor', ['as' => 'select_supervisor','uses' => 'GroupController@select_supervisor']);
// Route::post('add_supervisor_group', ['as' => 'add_supervisor_group','uses' => 'GroupController@add_supervisor_group']);
// Route::post('upload_image_group/{id}', ['as' => 'upload_image_group', 'uses' => 'GroupController@upload_image_group']);
// Route::post('upload_video_group/{id}', ['as' => 'upload_video_group', 'uses' => 'GroupController@upload_video_group']);
// Route::get('view_group_image/{id}', ['as' => 'view_group_image', 'uses' => 'GroupController@view_group_image']);
// //Route::get('view_video/{id}', ['as' => 'view_video', 'uses' => 'GroupController@view_video']);
// Route::get('delete_group_img/{id}', ['as' => 'delete_group_img', 'uses' => 'GroupController@delete_group_img']);
// Route::get('delete_group_video/{id}', ['as' => 'delete_group_video', 'uses' => 'GroupController@delete_group_video']);

// });






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::group(['prefix' => config('youtube.routes.prefix')], function() {
//     /**
//      * Authentication
//      */
//     Route::get(config('youtube.routes.authentication_uri'), function()
//     {
//         return redirect()->to(Youtube::createAuthUrl());
//     });
//     /**
//      * Redirect
//      */
//     Route::get(config('youtube.routes.redirect_uri'), function(Illuminate\Http\Request $request)
//     {
//         if(!$request->has('code')) {
//             throw new Exception('$_GET[\'code\'] is not set. Please re-authenticate.');
//         }
//         $token = Youtube::authenticate($request->get('code'));
//         Youtube::saveAccessTokenToDB($token);
//         return redirect(config('youtube.routes.redirect_back_uri', '/'));
//     });
// });