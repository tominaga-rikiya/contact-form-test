<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
 Route::middleware('auth')->group(function () 
 {
    Route::get('/admin', [DashboardController::class, 'admin']);
});

// 登録ページ
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');

// ログインページ
Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login', [AuthController::class, 'login']);

//管理ページ
Route::middleware(['auth'])->get('/admin', [DashboardController::class, 'index'])->name('admin');

//お問い合わせフォームページ
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

//確認ページ
Route::get('contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::post('contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');


// フォーム送信後のルート
Route::post('contacts/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks');

//サンクス
Route::get('/contacts/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks');
