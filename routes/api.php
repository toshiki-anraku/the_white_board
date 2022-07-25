<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
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
Route::get('the_white_board',[ProjectController::class,'index']);
Route::get('ver','API\VerController@index');
// localhost/api/testにgetすると…
Route::get('/test', function(){
    return 'api is working!';
});

Route::post('/register', [RegisterController::class, 'register']);// ユーザー登録
Route::post('/login', [LoginController::class, 'login']);// ログイン
Route::post('/logout', [LoginController::class, 'logout']);// ログアウト
Route::post('/projectList', [ProjectController::class, 'projectList']);//企画一覧
Route::get('/user', [ProjectController::class, 'user']);//ユーザ情報
Route::get('/home', [ProjectController::class, 'user']);//企画一覧
Route::get('/project/{user_id}', [ProjectController::class, 'project']);//企画一覧
Route::get('/like', [ProjectController::class, 'like']);//企画一覧
Route::get('/favorite', [ProjectController::class, 'favorite']);//企画一覧
Route::get('/secret_management', [ProjectController::class, 'secret_management']);//企画一覧

