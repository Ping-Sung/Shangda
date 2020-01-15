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

Route::prefix('supplier')->group(function(){
    Route::get('showName', 'SupplierController@showName')->name('api.supplier.showName');
    Route::post('getInfo', 'SupplierController@getInfo')->name('api.supplier.getInfo');
});

Route::prefix('material')->group(function(){
    Route::get('showName','MaterialController@showName')->name('api.material.showName');
    Route::post('getInfo','MaterialController@getInfo')->name('api.material.getInfo');
});



