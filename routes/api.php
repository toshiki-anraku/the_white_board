<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\FavoriteController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//会員登録
Route::get('the_white_board',[HomeController::class,'index']);
Route::get('ver','API\VerController@index');
// localhost/api/testにgetすると…
Route::get('/test', function(){
    return 'api is working!';
});

Route::post('/register', [RegisterController::class, 'register']);// ユーザー登録
Route::post('/login', [LoginController::class, 'login']);// ログイン
Route::post('/logout', [LoginController::class, 'logout']);// ログアウト
Route::post('/projectList', [ProjectController::class, 'projectList']);//企画一覧
Route::get('/user', [HomeController::class, 'user']);//ユーザ情報
Route::get('/home', [HomeController::class, 'user']);//企画一覧
Route::get('/project/{user_id}', [HomeController::class, 'project']);//企画一覧
Route::get('/secret_management', [HomeController::class, 'secret_management']);//企画一覧

/* Profile */
// お気に入り
Route::post('/favorite', [FavoriteController::class, 'favorite']);
// お気に入り解除
Route::delete('/favorite', [FavoriteController::class, 'unfavorite']);
// 良いね
Route::post('/like', [LikeController::class, 'like']);
// 良いね解除
Route::delete('/like', [LikeController::class, 'unlike']);
// ユーザー情報返却
Route::get('/profile', [ProfileController::class, 'show']);
// ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
Route::patch('/profile', [ProfileController::class, 'update']);
// プロフィール画像削除
Route::delete('/prof-img', [ProfileController::class, 'deleteImg']);
// プロフィール画像更新
Route::patch('/prof-img', [ProfileController::class, 'updateImg']);
// user_idに紐付く企画のデータを返却
Route::get('/projects/{id}', [ProfileController::class, 'indexProjects']);
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