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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ログアウト画面
Route::get('/logout',function()
    {
        return view('logout');
    })
->name('logout');

//スレ一覧
Route::get('/sures','SureController@indexSure')
->middleware('auth');

//スレ作成
Route::post('/sure','SureController@storeSure');

//レス一覧
Route::get('/resus/{code}','ResuController@indexResu')
->name('resus')
->middleware('auth');

//レス作成
Route::post('/resu','ResuController@storeResu');

//メッセージ検索一覧
Route::get('/searched','SearchController@indexSearch');

//メッセージ検索ページ
Route::get('/search',function()
    {
        return view('search');
    })
->middleware('auth');

//会員情報一覧
Route::get('/mypage','UserController@indexUser')
->middleware('auth');

//会員情報修正
Route::get('/edit','UserController@editUser')
->middleware('auth');

//会員情報更新
Route::post('/editing','UserController@storeUser');

//会員情報更新完了
Route::get('/edited',function()
    {
        return view('edited');
    })
->middleware('auth');

//ダウンロードページ
Route::get('/download',function()
    {
        return view('download');
    })
->middleware('auth');

//ダウンロード準備
Route::get('/downloading','DownloadController@indexDownload')
->middleware('auth');

//ダウンロード実行
Route::get('/downloaded','DownloadController@csvDownload')
->name('export.download');

//お問い合わせ画面
Route::get('/contact',function()
    {
        return view('contact');
    })
->name('contact')
->middleware('auth');

//お問い合わせ内容確認
Route::post('/contacting','ContactController@indexContact');

//お問い合わせ完了
Route::post('/contacted','ContactController@storeContact');
