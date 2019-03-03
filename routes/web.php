<?php

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

Route::get('/home', 'HomeController@index')->name('home');

//スレ一覧
Route::get('/sures','SureController@indexSure');

//スレ作成
Route::post('/sure','SureController@createSure');

//レス一覧（リダイレクトでパラメータを渡すために名前をつけています）
Route::get('/resus/{code}','ResuController@indexResu')
->name('resus');

//レス作成
Route::post('/resu','ResuController@createResu');

