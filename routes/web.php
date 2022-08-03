<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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
Route::get('/', [SampleController::class, 'top']);

// 認証者専用表示ルーティング
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [SampleController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('/home', [SampleController::class, 'sample'])
        ->name('home');
});

require __DIR__.'/auth.php';