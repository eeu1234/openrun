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

//검색페이지 검색 axios 메서도 호출
Route::any('/search','\App\Http\Controllers\Controller@searchPage');

/*관리자 페이지*/
Route::any('/admin','\App\Http\Controllers\Admin\AdminController@main');

/*사용자 페이지*/
Route::get('/productView/{productCode}','\App\Http\Controllers\User\ProductController@main')->name('productView');
Route::any('/productView/loadData','\App\Http\Controllers\User\ProductController@loadData'); //사용자가 페이지 접근시 데이터 불러옴
Route::any('/salesList','\App\Http\Controllers\User\ProductController@salesLog');
Route::any('/salesTimeline','\App\Http\Controllers\User\ProductController@timelineLog');
/*체크박스 검색페이지*/
Route::any('/searchMain','\App\Http\Controllers\User\SearchController@main'); // 사용자가 페이지 접근시
Route::any('/checkSearch/searchData','\App\Http\Controllers\User\SearchController@searchData'); //사용자가 검색버튼을 누를 때 데이터 불러옴
Route::any('/checkSearch/loadData','\App\Http\Controllers\User\SearchController@loadData'); //사용자가 페이지 접근시 데이터 불러옴




