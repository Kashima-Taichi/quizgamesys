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
});

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
    return view('addquiz/addquiz');
})->name('addquiz');