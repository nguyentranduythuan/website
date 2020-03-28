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

Route::group(['prefix' => 'e-contact', 'middleware' => ['api'], 'namespace' => 'API'], function () {
    
	Route::post('/login', ['as' => 'app', 'uses' => 'EContactController@login']);
	Route::post('/logout', ['as' => 'app', 'uses' => 'EContactController@logout']);
	Route::post('/get_all_contact', ['as' => 'app', 'uses' => 'EContactController@getAllContact']);
	Route::post('/sync_one_contact', ['as' => 'app', 'uses' => 'EContactController@syncOneContact']);

});

Route::group(['prefix' => 'Webservice', 'middleware' => ['api'], 'namespace' => 'API'], function () {
    
	Route::get('/SendMT2.asmx', ['as' => 'app', 'uses' => 'ClientSMSController@view_send_sms']);
	Route::post('/SendMT2.asmx', ['as' => 'app', 'uses' => 'ClientSMSController@send_sms']);

});