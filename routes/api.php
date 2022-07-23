<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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
Route::get('/like', [HomeController::class, 'like']);//企画一覧
Route::get('/favorite', [HomeController::class, 'favorite']);//企画一覧
Route::get('/secret_management', [HomeController::class, 'secret_management']);//企画一覧

/* Profile */
// お気に入り
Route::get('/favorite', [FavoriteController::class, 'favorite']);
// お気に入り解除
Route::get('/unfavorite', [FavoriteController::class, 'unfavorite']);
// 良いね
Route::get('/like', [LikeController::class, 'like']);
// 良いね解除
Route::get('/unlike', [LikeController::class, 'unlike']);
// ユーザー情報返却
Route::get('/profile', [ProfileController::class, 'show']);
// トプ画変更
Route::get('/', [ProfileController::class, 'update']);
// トプ画削除
Route::get('/', [ProfileController::class, 'deleteImg']);
// ユーザー名(name),メールアドレス(email), 自己紹介文(description)の更新処理
Route::get('/', [ProfileController::class, 'updateImg']);
// user_idに紐付く企画のデータを返却
Route::get('/', [ProfileController::class, 'indexProjects']);
// 退会処理
Route::get('/', [ProfileController::class, 'withdrawal']);
// パスワード変更
Route::get('/', [ProfileController::class, 'resetPassword']);
// フォロー
Route::get('/', [ProfileController::class, 'follow']);
// フォロー解除
Route::get('/', [ProfileController::class, 'unfollow']);
// 全フォローユーザーのレコード取得
Route::get('/', [ProfileController::class, 'getFollow']);
// 全フォロワーのレコードを取得
Route::get('/', [ProfileController::class, 'getFollower']);