<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Project */
// ログインしているユーザが閲覧可能な全企画データを取得
Route::get('/projects', [ProjectController::class, 'index']);
// 企画の作成
Route::post('/project', [ProjectController::class, 'store']);
// 企画詳細の表示
Route::get('/project', [ProjectController::class, 'show']);
// 企画の更新
Route::put('/project', [ProjectController::class, 'update']);
// 企画の削除
Route::delete('/project', [ProjectController::class, 'destroy']);

/* Profile */
// お気に入り on/off
Route::post('/favorite', [FavoriteController::class, 'favorite']);
// いいね on/off
Route::post('/like', [LikeController::class, 'like']);
// ユーザー情報返却
Route::get('/profile', [ProfileController::class, 'show']);
// ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
Route::patch('/profile', [ProfileController::class, 'update']);
// プロフィール画像削除
Route::delete('/prof-img', [ProfileController::class, 'deleteImg']);
// プロフィール画像更新
Route::patch('/prof-img', [ProfileController::class, 'updateImg']);
// user_idに紐付く企画のデータを返却
Route::get('/my-projects', [ProfileController::class, 'indexProjects']);
// 退会処理
Route::delete('/account', [ProfileController::class, 'withdrawal']);
// パスワード変更
Route::patch('/password', [ProfileController::class, 'resetPassword']);
// フォロー
Route::post('/follow', [ProfileController::class, 'follow']);
// フォロー解除
Route::delete('/follow', [ProfileController::class, 'unfollow']);
// 全フォローユーザーのレコード取得
Route::get('/follows', [ProfileController::class, 'getFollow']);
// 全フォロワーのレコードを取得
Route::get('/followers', [ProfileController::class, 'getFollower']);