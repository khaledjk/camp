<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(['get', 'post'],'get_api_daily', 'APIController@get_api_daily');

Route::match(['get', 'post'],'get_api_schedule', 'APIController@get_api_schedule');

Route::match(['get', 'post'],'get_api_image_date', 'APIController@get_api_image_date');

Route::match(['get', 'post'],'get_api_images', 'APIController@get_api_images');

Route::match(['get', 'post'],'login_api', 'APIController@login_api');

Route::match(['get', 'post'],'get_kids_ids', 'APIController@get_kids_ids');




