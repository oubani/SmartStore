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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/profile', 'UserController@profile'); // done
Route::get('/editProfile', 'UserController@editProfile');  // done
Route::post('/userupdate', 'UserController@updateProfile'); // done

Route::get('/products', 'ProductController@categored'); // this route to display products to clients
Route::get('/products/{id}', 'ProductController@categored'); // this route to display product to clients by categories
Route::get('/product/{id}', 'ProductController@show'); // this route to display product to clients
Route::get('/allProducts', 'ProductController@allProducts'); // this route is for adimn to see all products
Route::get('/gproduct/{id}', 'ProductController@productDetails'); // this page display details of product it's for admin
Route::get('/gproduct/{id}/edit', 'ProductController@edit'); // this page display details of product it's for admin

Route::post('/add', 'CartController@add');
Route::post('/updatecart', 'CartController@updatecart');
Route::get('/deleteItem/{id}', 'CartController@delete');
Route::get('/cart', 'CartController@cart');
Route::get('/cart/destroy', 'CartController@destroy');

Route::get('/addproduct', 'ProductController@create');
Route::post('/productstore', 'ProductController@store');
Route::post('productupdate', 'ProductController@update');

Route::get('/search', 'ProductController@search');

Route::post('/confirmOrder', 'OrderController@store');
Route::get('/validate', 'OrderController@valid');
Route::get('myorders', 'OrderController@index');
Route::get('storeorder', 'OrderController@show');
Route::get('/order/{id}/valide', 'OrderController@valideOrder');
Route::get('/order/{id}/details', 'DetailController@show');
Route::get('/orders', 'OrderController@allorders');
Route::get('/notdelivred', 'OrderController@notdelivred');
Route::get('/delivred', 'OrderController@delivred');
Route::get('/orders/{id}/detail', 'OrderController@details');

Route::get('/clientliste', 'ClientController@index');
Route::get('/clientliste/admins', 'ClientController@admins');
Route::get('/clientliste/clients', 'ClientController@clients');
Route::get('/clients/upgrade/{id}', 'ClientController@upgrade');
Route::get('/clients/degrade/{id}', 'ClientController@degrade');

Route::get('/categories', 'CategorieController@index');
Route::get('/categories/create', 'CategorieController@create');
Route::post('/categories', 'CategorieController@store');
Route::get('/categories/{id}/edit', 'CategorieController@edit');
Route::post('/categories/{id}/edit', 'CategorieController@update');
