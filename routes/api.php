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

Route::get('content', array('middleware' => 'cors', 'uses' => 'ItemController@index'));
Route::get('content/{slug}','ItemController@show');
Route::post('content','ItemController@create');
Route::put('content/{id}', 'ItemController@update');
Route::delete('content/{id}', 'ItemController@destroy');
