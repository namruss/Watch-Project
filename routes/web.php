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
    //Categories
    Route::get('/categories',"CategoryController@index")->name('categories.index');
    Route::get('/categories/search', "CategoryController@search")->name('categories.search');
    Route::get('/categories/create',"CategoryController@create")->name('categories.create');
    Route::post('/categories',"CategoryController@store")->name('categories.store');
    Route::get('/categories/{id}/edit',"CategoryController@edit")->name('categories.edit');
    Route::put('/categories/{id}',"CategoryController@update")->name('categories.update');
    Route::delete('/categories/{id}',"CategoryController@delete")->name('categories.delete');
});