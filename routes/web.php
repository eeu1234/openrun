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
Route::get('/', function () {
    return view('main');
})->name('home');   // 변경하지 말것
Route::any('/store','\App\Http\Controllers\Controller@storeList');

//검색페이지 검색 axios 메서도 호출
Route::any('/search','\App\Http\Controllers\Controller@searchPage');

/*관리자 페이지*/
Route::any('/admin','\App\Http\Controllers\Admin\AdminController@main');

/*사용자 페이지*/
//Route::get('/productView/{productCode?}','\App\Http\Controllers\User\ProductController@main');
Route::any('/productView',function () { return view('productView');});
Route::any('/productView/{no}',function($no){
    return view('productView',['no' => $no]);
});
/*제품 상세페이지*/
Route::any('/getProductDetail','\App\Http\Controllers\User\ProductController@getProductDetail'); //사용자가 페이지 접근시 데이터 불러옴
/*판매기록 데이터*/
Route::any('/salesData/{no}',function($no){
    return view('salesData',['no' => $no]);
});
Route::any('/getSalesData','\App\Http\Controllers\User\SalesController@getSalesData');
Route::any('/getSalesTimelineData','\App\Http\Controllers\User\SalesController@getSalesTimelineData');

Route::any('/getSalesLog','\App\Http\Controllers\User\SalesController@getSalesLog');
Route::any('/getSalesLogThisYearMonth','\App\Http\Controllers\User\SalesController@getSalesLogThisYearMonth');



/*체크박스 검색페이지*/
Route::any('/searchMain','\App\Http\Controllers\User\SearchController@main'); // 사용자가 페이지 접근시
Route::any('/checkSearch/searchData','\App\Http\Controllers\User\SearchController@searchData'); //사용자가 검색버튼을 누를 때 데이터 불러옴
Route::any('/checkSearch/loadData','\App\Http\Controllers\User\SearchController@loadData'); //사용자가 페이지 접근시 데이터 불러옴

Route::any('/checkSearch/getStoreList','\App\Http\Controllers\User\SearchController@getStoreList'); //사용자가 페이지 접근시 데이터 불러옴




