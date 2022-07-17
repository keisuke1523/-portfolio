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



Route::get('hello', 'App\Http\Controllers\HelloController@index');
Route::post('hello', 'App\Http\Controllers\HelloController@post');
Route::get('mypage', 'App\Http\Controllers\mypageController@index');
Route::get('Top', 'App\Http\Controllers\TopController@index');
Route::get('keigi', 'App\Http\Controllers\keigiController@index');

//////////////追加分///////////////////
//登録画面
Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\RegisterController@store')->name('register');

//ログイン画面
Route::get('/login', 'App\Http\Controllers\loginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\loginController@login')->name('login');
//////////////追加分///////////////////


//////////////////追加分//////////////////
// 入力画面
Route::get('/input', 'App\Http\Controllers\InputController@index');
// 確認画面
Route::post('/confirm', 'App\Http\Controllers\ConfirmController@index');
//////////////////追加分//////////////////

//////////////////追加分//////////////////
// 確認画面
Route::post('/confirm2', 'App\Http\Controllers\ConfirmController@store')->name('confirm2');
// 一覧画面
Route::get('/list', 'App\Http\Controllers\ListController@index')->name('list');
//////////////////追加分//////////////////

Route::get('/acount', 'App\Http\Controllers\acountController@index')->name('acount');
Route::post('/acount', 'App\Http\Controllers\acountController@store')->name('acount');
Route::get('/toppage', 'App\Http\Controllers\toppageController@index');

//////////////////追加分//////////////////
Route::get('/keijiban', 'App\Http\Controllers\keijibanController@index');
// 問い合わせ
Route::get('/contact', 'App\Http\Controllers\contactController@index');
Route::post('/contact', 'App\Http\Controllers\contactController@sendMail')->name('sendMail');

//日記
Route::get('/diary', 'App\Http\Controllers\diaryController@index');
// 日記
Route::post('/diary', 'App\Http\Controllers\diaryController@registerPost')->name('diaryRegister');

// 掲示板(2ch風)
Route::get('/bbs/{categoryId}', 'App\Http\Controllers\BBSController@index');
Route::get('/bbs/detail/{id}', 'App\Http\Controllers\BBSController@index2');
Route::get('/bbs', function () {
    return redirect('/bbs/1');
});
Route::post('/bbsRegister', 'App\Http\Controllers\BBSController@registerPost')->name('bbsRegister');

//掲示板削除用
Route::post('/bbsDeletePost', 'App\Http\Controllers\BBSController@deletePost')->name('deletePost');
Route::post('/bbsDeletePostReply', 'App\Http\Controllers\BBSController@deletePostReply')->name('deletePostReply');


// 掲示板画面
Route::post('/bbsReplyRegister', 'App\Http\Controllers\BBSController@registerReply')->name('bbsReplyRegister');

//ララベル　練習用
Route::get('/people', 'App\Http\Controllers\peopleController@index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
