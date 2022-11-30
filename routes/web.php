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
Route::any('/','\App\Http\Controllers\Controller@index');
Route::any('/store','\App\Http\Controllers\Controller@storeList');

//검색페이지 검색 acxios 메서도 호출
Route::any('/search','\App\Http\Controllers\Controller@searchPage');

/*관리자 페이지*/
Route::any('/admin','\App\Http\Controllers\Admin\AdminController@main');

/*사용자 페이지*/
Route::any('/productView','\App\Http\Controllers\User\ProductController@main');
/*체크박스 검색페이지*/
Route::any('/productView','\App\Http\Controllers\User\ProductController@main');



