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

Route::group([
	// 'middleware' => 'cors'
], function() {
	Route::get('getCategories', 'ApiController@getCategories');
	Route::get('getQuestions/{id?}', 'ApiController@getQuestions');
	Route::post('saveQuestion', 'ApiController@saveQuestion');
	Route::put('updateQuestion/{id?}', 'ApiController@updateQuestion');
	Route::delete('deleteQuestion/{id?}', 'ApiController@deleteQuestion');

	Route::get('getQuizQuestion', 'ApiController@getQuizQuestion');

	Route::get('getCustomers', 'ApiController@getCustomers');
	Route::post('saveCustomer', 'ApiController@saveCustomer');
	Route::put('updateCustomer/{id}', 'ApiController@updateCustomer');
	Route::delete('deleteCustomer/{id}', 'ApiController@deleteCustomer');
	
});
