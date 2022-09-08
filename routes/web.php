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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// category


Route::get('Category/All','CategoryController@AllCat')->name('all.category');

Route::post('Category/Add','CategoryController@AddCat')->name('store.category');

// edit

Route::get( 'Category/Edit/{id}', 'CategoryController@Edit');

// post

Route::post( 'Store/Category/{id}', 'CategoryController@update');

// delete

Route::get( 'Softdelete/Category/{id}', 'CategoryController@softDelete');

// brand

Route::get('/Brand/All','BrandController@Allbrand')->name('all.brand');

Route::post( '/Brand/Add/', 'BrandController@storeBrand')->name('store.brand');

Route::get('/brand/edit/{id}', 'BrandController@Edit');

Route::post('/update/brand/{id}','BrandController@update');




