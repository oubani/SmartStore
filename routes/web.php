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
use Illuminate\Support\Facades\Auth;

// Route::get('/{ln}', function ($ln) {
//     App::setlocale($ln);
//     return view('welcome');
// });

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    DB::table('promotions')->where('date_expires', '<', date('Y-m-d'))->delete();
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/profile', 'UserController@profile')->middleware('auth'); // done
Route::get('/editProfile', 'UserController@editProfile')->middleware('auth');  // done
Route::post('/userupdate', 'UserController@updateProfile')->middleware('auth'); // done

Route::get('/products', 'ProductController@categored'); // this route to display products to clients
Route::get('/products/{id}', 'ProductController@categored'); // this route to display product to clients by categories
Route::get('/product/{id}', 'ProductController@show'); // this route to display product to clients
Route::get('/allProducts', 'ProductController@allProducts')->middleware('auth'); // this route is for adimn to see all products
Route::get('/gproduct/{id}', 'ProductController@productDetails')->middleware('auth'); // this page display details of product it's for admin
Route::get('/gproduct/{id}/edit', 'ProductController@edit')->middleware('auth'); // this page display details of product it's for admin

Route::post('/add', 'CartController@add');
Route::post('/updatecart', 'CartController@updatecart');
Route::get('/deleteItem/{id}', 'CartController@delete');
Route::get('/cart', 'CartController@cart');
Route::get('/cart/destroy', 'CartController@destroy');

Route::get('/addproduct', 'ProductController@create')->middleware('auth');
Route::post('/productstore', 'ProductController@store')->middleware('auth');
Route::post('productupdate', 'ProductController@update')->middleware('auth');

Route::get('/search', 'ProductController@search');

Route::post('/confirmOrder', 'OrderController@store')->middleware('auth');
Route::get('/validate', 'OrderController@valid')->middleware('auth');
Route::get('myorders', 'OrderController@index')->middleware('auth');
Route::get('storeorder', 'OrderController@show')->middleware('auth');
Route::get('/order/{id}/valide', 'OrderController@valideOrder')->middleware('auth');
Route::get('/order/{id}/details', 'DetailController@show')->middleware('auth');
Route::get('/orders', 'OrderController@allorders')->middleware('auth');
Route::get('/notdelivred', 'OrderController@notdelivred')->middleware('auth');
Route::get('/delivred', 'OrderController@delivred')->middleware('auth');
Route::get('/orders/{id}/detail', 'OrderController@details')->middleware('auth');

Route::get('/clientliste', 'ClientController@index')->middleware('auth');
Route::get('/clientliste/admins', 'ClientController@admins')->middleware('auth');
Route::get('/clientliste/clients', 'ClientController@clients')->middleware('auth');
Route::get('/clients/upgrade/{id}', 'ClientController@upgrade')->middleware('auth');
Route::get('/clients/degrade/{id}', 'ClientController@degrade')->middleware('auth');

Route::resource('categories', 'CategorieController')->middleware('auth');
Route::resource('contact', 'ConatctUsController');

Route::resource('promotions', 'PromotionController')->middleware('auth');
