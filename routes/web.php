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

//Route::get('/', function () {
//    return view('welcome') ;
//});
Route::get('/','\App\Http\Controllers\Controller@index')->name('view');
Route::any('/store','\App\Http\Controllers\Controller@storeList')->name('store');

//검색페이지
Route::post('/search','\App\Http\Controllers\Controller@searchPage')->name('search');

/*관리자 페이지*/
Route::get('/admin','\App\Http\Controllers\Admin\AdminController@main')->name('view');

/*사용자 페이지*/
Route::get('/search','\App\Http\Controllers\User\SearchController@main')->name('view');
Route::any('/productView','\App\Http\Controllers\User\ProductController@main');
//Route::get('/test', '\App\Http\Controllers\Controller@index');


