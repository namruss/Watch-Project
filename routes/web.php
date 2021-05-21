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
Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\Admin'],function(){
    Route::get('/',"AdminController@login")->name('admin.login');
    Route::get('/dashboard',"AdminController@dashboard")->name('admin.dashboard');
    //Profile
    Route::get('/profile',"AdminController@profile")->name('admin.profile');
    //Categories
    Route::get('/categories',"CategoryController@index")->name('categories.index');
    Route::get('/categories/search', "CategoryController@search")->name('categories.search');
    Route::get('/categories/create',"CategoryController@create")->name('categories.create');
    Route::post('/categories',"CategoryController@store")->name('categories.store');
    Route::get('/categories/{id}/edit',"CategoryController@edit")->name('categories.edit');
    Route::put('/categories/{id}',"CategoryController@update")->name('categories.update');
    Route::delete('/categories/{id}',"CategoryController@delete")->name('categories.delete');
    //Brands
    Route::get('/brands',"BrandController@index")->name('brands.index');
    Route::get('/brands/search', "BrandController@search")->name('brands.search');
    Route::get('/brands/create',"BrandController@create")->name('brands.create');
    Route::post('/brands',"BrandController@store")->name('brands.store');
    Route::get('/brands/{id}/edit',"BrandController@edit")->name('brands.edit');
    Route::put('/brands/{id}',"BrandController@update")->name('brands.update');
    Route::delete('/brands/{id}',"BrandController@delete")->name('brands.delete');
    //Product
    Route::get('/products',"ProductController@index")->name('products.index');
    Route::get('/products/search', "ProductController@search")->name('products.search');
    Route::get('/products/create',"ProductController@create")->name('products.create');
    Route::post('/products',"ProductController@store")->name('products.store');
    Route::get('/products/{id}/edit',"ProductController@edit")->name('products.edit');
    Route::put('/products/{id}',"ProductController@update")->name('products.update');
    Route::delete('/products/{id}',"ProductController@delete")->name('products.delete');
     //Order
     Route::get('/orders',"OrderController@index")->name('orders.index');
     Route::get('/orders/delivery_order_list',"OrderController@delivery")->name('orders.delivery');
     Route::get('/orders/excuted_order_list',"OrderController@excuted")->name('orders.excuted');
     Route::get('/orders/search', "OrderController@search")->name('orders.search');
     Route::post('/orders',"OrderController@store")->name('orders.store');
     Route::get('/orders/{id}/edit',"OrderController@edit")->name('orders.edit');
     Route::put('/orders/{id}',"OrderController@update")->name('orders.update');
     Route::delete('/orders/{id}',"ProductController@delete")->name('orders.delete');
    
});