<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
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

// 第一引数：コンポーネント
// 第二引数：プロパティ配列
// resources/js/PagesのWelcome.vueを作成したが表示されず
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard',[
        'home' => Route::has('home'),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home',[SampleController::class, 'sample']);

require __DIR__.'/auth.php';
