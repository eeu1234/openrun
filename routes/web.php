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

/*관리자 페이지*/
Route::get('/admin','\App\Http\Controllers\Admin\AdminController@main')->name('view');

/*사용자 페이지*/
Route::get('/seach','\App\Http\Controllers\User\SearchController@main')->name('view');
//Route::get('/test', '\App\Http\Controllers\Controller@index');


