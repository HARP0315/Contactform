<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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

Route::get('/',[ContactController::class,'index']);
Route::post('/', [ContactController::class, 'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/thanks',[ContactController::class, 'store']);
Route::get('/admin', [UserController::class, 'index']);
Route::get('/admin/search', [UserController::class, 'search']);
// TODO 課題：モーダルからの削除。JS含め自分でも書けるように
Route::delete('/admin/{contact}', [UserController::class, 'destroy'])->name('contact.destroy');
Route::get('/logout', [UserController::class, 'logout']);

// TODO 課題：AIに聞いたものをそのまま。自分でも書けるようになる
// CSVエクスポート用ルート
// GETメソッドで検索条件を受け取り、CSVをダウンロードさせる
Route::get('/admin/export-csv', [UserController::class, 'exportCsv'])
    ->name('admin.export-csv'); // ルートに名前を付けておく
