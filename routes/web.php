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
use App\Models\Service;

// Route::post('login','Auth\LoginController@login')->name('login');
// Route::get('logout','Auth\LoginController@logout')->name('logout');
//Route::view('/','pages.home');
Route::get('/', 'HomeController@index')->name('index');
Route::get('index2','HomeController@master')->name('index2');
Route::get('about.html', 'HomeController@about')->name('about');
Route::get('service', 'HomeController@service')->name('service');
Route::get('category-service/{slug}.html','HomeController@serviceByCate')->name('serbyCate');
Route::get('service-detail/{slug}.html', 'HomeController@service_detail')->name('service-detail');
Route::get('projects', 'HomeController@projects')->name('projects');
Route::get('category-project/{slug}.html','HomeController@projectByCate');
// Route::get('projects/{slug}', 'HomeController@project')->name('projects');
//Route::get('project/{id}','HomeController@getProject');
Route::get('project-detail/{slug}.html', 'HomeController@projects_detail')->name('projects');
Route::get('tin-tuc', 'HomeController@blogs')->name('blog');
Route::get('category-blog/{slug}.html','HomeController@blogByCate');
Route::get('tag/{slug}.html','HomeController@blogByTag');
Route::get('blog-details/{slug}.html', 'HomeController@blogs_detail')->name('blog_details');
Route::get('contact.html', 'HomeController@contact')->name('contact');
Route::post('contact.html', 'HomeController@postContact')->name('postData');
Route::post('consultant.html', 'HomeController@consultant')->name('consultant');
Route::get('dang-nhap','HomeController@getLogin')->name('dangnhap');
Route::post('dang-nhap','HomeController@postLogin')->name('postLogin');
Route::get('dang-xuat','HomeController@dangxuat')->name('dangxuat');
Route::get('dang-ki','HomeController@register')->name('dangki');
Route::post('dang-ki','HomeController@postRegister')->name('postRegister');
Route::get('search','HomeController@search')->name('search');
//Route::get('comment/{id}','HomeController@comment')->name('comment.create');
Route::get('comment/add/{id}',['uses' => 'CommentController@store','as'=>'comment.store']);
Route::post('comment/add/{id}',['uses' => 'CommentController@store','as'=>'comment.store']);
Route::get('comment/add/{id}',['uses' => 'CommentController@store','as'=>'comment.store']);
Route::post('comment/add/{id}',['uses' => 'CommentController@store','as'=>'comment.store']);
Route::get('reply/add/{id}',['uses' => 'CommentController@reply','as'=>'reply.store']);
Route::post('reply/add/{id}',['uses' => 'CommentController@reply','as'=>'reply.store']);
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('export', 'HomeController@export')->name('export');
Route::get('import_export', 'HomeController@import_export');
Route::post('import', 'HomeController@import')->name('import');


Route::group(['prefix' => 'client', 'middleware' => ['web'], 'namespace' => 'Client'], function () {
    
	Route::get('/', ['as' => '', 'uses' => 'HomeController@index'])->name('home');
	Route::get('/login', ['as' => '', 'uses' => 'AccountController@login'])->name('login');
	Route::post('/login', ['as' => '', 'uses' => 'AccountController@postLogin']);
	Route::get('/logout', ['as' => '', 'uses' => 'AccountController@logout']);
	Route::get('/profile', ['as' => '', 'uses' => 'AccountController@profile'])->name('profile');
	Route::post('/profile', ['as' => '', 'uses' => 'AccountController@postProfile']);
	Route::post('/profile-change-password', ['as' => '', 'uses' => 'AccountController@postChangePassword']);
	Route::post('/profile-change-avatar', ['as' => '', 'uses' => 'AccountController@postChangeAvatar']);

	Route::get('/payment', ['as' => '', 'uses' => 'AccountController@payment'])->name('payment');
	Route::post('/payment/ajax_nap_tien', ['as' => '', 'uses' => 'AccountController@listPaymentAjax'])->name('payment');
	Route::get('/payment/history', ['as' => '', 'uses' => 'AccountController@paymentHistory'])->name('payment');
	Route::post('/payment/ajax_history', ['as' => '', 'uses' => 'AccountController@paymentHistoryAjax'])->name('payment');

	Route::get('/create_campaign', ['as' => '', 'uses' => 'AccountController@createCampaign'])->name('create_campaign');
	Route::post('/create_campaign', ['as' => '', 'uses' => 'AccountController@postCreateCampaign']);

	Route::get('/list_campaign', ['as' => '', 'uses' => 'AccountController@listCampaign'])->name('list_campaign');
	Route::post('/list_campaign/ajax', ['as' => '', 'uses' => 'AccountController@listCampaignAjax']);
	Route::get('/list_campaign/edit/{id}', ['as' => '', 'uses' => 'AccountController@editCampaign']);

	Route::get('/import_sms', ['as' => '', 'uses' => 'SMSController@importDataSms'])->name('import_sms');
	Route::post('/import_sms/ajax', ['as' => '', 'uses' => 'SMSController@listDataSMSAjax']);
	Route::post('/import_sms/import_data', ['as' => '', 'uses' => 'SMSController@postImportDataSMS']);
	Route::get('/report_sms', ['as' => '', 'uses' => 'SMSController@reportDataSms'])->name('report_sms');
	Route::post('/report_sms/ajax', ['as' => '', 'uses' => 'SMSController@reportDataSmsAjax']);
	Route::post('/report_sms/download', ['as' => '', 'uses' => 'SMSController@reportDataSmsDownload']);
	Route::get('/api_sms', ['as' => '', 'uses' => 'SMSController@APISMS'])->name('api_sms');
	Route::post('/api_sms/create_api', ['as' => '', 'uses' => 'SMSController@createAPI']);
	Route::get('/api_sms/renewkey/{id}', ['as' => '', 'uses' => 'SMSController@changeAPI']);
	Route::post('/api_sms/ajax', ['as' => '', 'uses' => 'SMSController@APISMSAjax']);
	Route::post('/api_sms/update-status', ['as' => '', 'uses' => 'SMSController@APISMSUpdateStatus']);

	Route::get('/import_phone', ['as' => '', 'uses' => 'CheckPhoneController@importDataCheckPhone'])->name('import_phone');
	Route::post('/import_phone/ajax', ['as' => '', 'uses' => 'CheckPhoneController@listDataCheckPhoneAjax']);
	Route::post('/import_phone/import_data', ['as' => '', 'uses' => 'CheckPhoneController@postImportDataCheckPhone']);
	Route::get('/report_phone', ['as' => '', 'uses' => 'CheckPhoneController@reportDataPhone'])->name('report_phone');
	Route::post('/report_phone/ajax', ['as' => '', 'uses' => 'CheckPhoneController@reportDataPhoneAjax']);
	Route::post('/report_phone/download', ['as' => '', 'uses' => 'CheckPhoneController@reportDataPhoneDownload']);
	Route::get('/api_phone', ['as' => '', 'uses' => 'CheckPhoneController@APICheckPhone'])->name('api_phone');
	Route::post('/api_phone/create_api', ['as' => '', 'uses' => 'CheckPhoneController@createAPI']);
	Route::get('/api_phone/renewkey/{id}', ['as' => '', 'uses' => 'CheckPhoneController@changeAPI']);
	Route::post('/api_phone/ajax', ['as' => '', 'uses' => 'CheckPhoneController@APICheckPhoneAjax']);
	Route::post('/api_phone/update-status', ['as' => '', 'uses' => 'CheckPhoneController@APICheckPhoneUpdateStatus']);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
