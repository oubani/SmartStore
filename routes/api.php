<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'ApiAuthController@login');
// Route::post('register', 'UserController@register');
Route::post('store', 'ProductController@store');
Route::post('setPromotion', 'ProductController@setPromotion');
Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'ApiAuthController@logout');
});
