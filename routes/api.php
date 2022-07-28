<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// ログインしているユーザが閲覧可能な全企画データを取得
Route::get('/projects', [ProjectController::class, 'index']);
// 企画の作成
Route::post('/projects', [ProjectController::class, 'store']);
// 企画詳細の表示
Route::get('/projects/{id}', [ProjectController::class, 'show']);
// 企画の更新
Route::put('/projects', [ProjectController::class, 'update']);
// 企画の削除
Route::delete('/projects', [ProjectController::class, 'destroy']);

