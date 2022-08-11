<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

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

// 未認証表示ルーティング
Route::get('/project', [ProjectController::class, 'show'])->name('show');
Route::get('/', [ProjectController::class, 'top'])->name('top');

// 認証者専用表示ルーティング
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mypage', [ProfileController::class, 'mypage'])
        ->name('mypage');
});

require __DIR__.'/auth.php';