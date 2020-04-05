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


// サイトトップへのルーティング
Route::get('/', function () {
    return view('topMenu');
})->name('top');

// クイズ管理メニューへのルーティング
Route::get('/quizmanage', function () {
    return view('quizmanage/quizManage');
})->name('quizManage');

// クイズゲームへのルーティング
Route::get('/playquiz', function () {
    return view('game/game');
})->name('playquiz');

// クイズ登録へのルーティング
Route::get('/quizmanage/addquiz', function () {
    return view('quizmanage/addquiz/addquiz');
})->name('addquiz');

// クイズ登録処理とその後のクイズ登録画面へのルーティング
Route::post('/quizmanage/addquiz/addquiz', 'quizManageController@addQuiz');

// 登録したクイズを参照する画面へのルーティング
Route::get('/quizmanage/refquiz/referencequiz', 'quizManageController@referenceQuiz')->name('refquiz');