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


Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');
Route::get('mypage', 'mypageController@index');
Route::get('Top', 'App\Http\Controllers\TopController@index');
Route::get('keigi', 'App\Http\Controllers\keigiController@index');

//////////////追加分///////////////////
//登録画面
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@store')->name('register');

//ログイン画面
Route::get('/login', 'loginController@index')->name('login');
Route::post('/login', 'loginController@login')->name('login');
//////////////追加分///////////////////


//////////////////追加分//////////////////
// 入力画面
Route::get('/input', 'InputController@index');
// 確認画面
Route::post('/confirm', 'ConfirmController@index');
//////////////////追加分//////////////////

//////////////////追加分//////////////////
// 確認画面
Route::post('/confirm2', 'ConfirmController@store')->name('confirm2');
// 一覧画面
Route::get('/list', 'ListController@index')->name('list');
//////////////////追加分//////////////////

Route::get('/acount', 'acountController@index')->name('acount');
Route::post('/acount', 'acountController@store')->name('acount');
Route::get('/toppage', 'toppageController@index');

//////////////////追加分//////////////////
Route::get('/keijiban', 'App\Http\Controllers\keijibanController@index');
// 問い合わせ
Route::get('/contact', 'contactController@index');
Route::post('/contact', 'contactController@sendMail')->name('sendMail');

//日記
Route::get('/diary', 'diaryController@index');
// 日記
Route::post('/diary', 'diaryController@registerPost')->name('diaryRegister');

// 掲示板(2ch風)
Route::get('/bbs/{categoryId}', 'BBSController@index');
Route::get('/bbs/detail/{id}', 'BBSController@index2');
Route::get('/bbs', function () {
    return redirect('/bbs/1');
});
Route::post('/bbsRegister', 'BBSController@registerPost')->name('bbsRegister');

//掲示板削除用
Route::post('/bbsDeletePost', 'BBSController@deletePost')->name('deletePost');
Route::post('/bbsDeletePostReply', 'BBSController@deletePostReply')->name('deletePostReply');


// 掲示板画面
Route::post('/bbsReplyRegister', 'BBSController@registerReply')->name('bbsReplyRegister');

//ララベル　練習用
Route::get('/people', 'App\Http\Controllers\peopleController@index');
Route::get('/response', 'responseController@index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
