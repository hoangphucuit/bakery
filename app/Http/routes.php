<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chi-tiet-san-pham',
	'uses'=>'PageController@getChitietsanpham'
	]);
Route::get('gioi-thieu',[
	'as'=>'gioi-thieu',
	'uses'=>'PageController@getGioithieu'
	]);
Route::get('lien-he',[
	'as'=>'lien-he',
	'uses'=>'PageController@getLienhe'
	]);
Route::get('loai-san-pham/{id}',[
	'as'=>'loai-san-pham',
	'uses'=>'PageController@getLoaisp'
	]);
Route::get('them-gio-hang/{id}',[
	'as'=>'them-gio-hang',
	'uses'=>'PageController@getThemgiohang'
	]);
Route::get('xoa-san-pham/{id}',[
	'as'=>'xoa-san-pham',
	'uses'=>'PageController@getXoasanpham'
	]);
Route::get('dat-hang',[
	'as'=>'dat-hang',
	'uses'=>'PageController@getDathang'
	]);
Route::post('dat-hang',[
	'as'=>'post_dat_hang',
	'uses'=>'PageController@postDathang'
	]);
Route::get('dang-nhap',[
	'as'=>'dang-nhap',
	'uses'=>'PageController@getDangnhap'
	]);
Route::get('dang-ki',[
	'as'=>'dang-ki',
	'uses'=>'PageController@getDangki'
	]);

Route::get('tim-kiem',[
	'as'=>'tim-kiem',
	'uses'=>'PageController@getTimkiem'
	]);