<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Game\StaticController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\LockController;
use App\Http\Controllers\User\UnlockController;
use App\Http\Controllers\Api\Games\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes for admin and Api UploadGame for the System

Route::get('XX_module_c/admin', [AdminController::class, 'index'])->name('login');
Route::post('XX_module_c/admin', [AdminController::class, 'login']);

Route::middleware('auth:web')->group(function() {
    Route::get('XX_module_c/admin/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('XX_module_c/admin/user', [AdminUserController::class, 'index']);

    Route::get('/', function() {
        return redirect('XX_module_c/admin/user');
    })->middleware('auth:web');

    Route::resource('XX_module_c/user', UserController::class)->parameter('user', 'user:username');
    Route::resource('user.lock', LockController::class);

    Route::post('/user/{user}/unlock', [UnlockController::class, 'store'])->withTrashed();

    Route::resource('XX_module_c/game', GameController::class)->parameter('game', 'game:slug');

    Route::resource('XX_module_c/score', ScoreController::class);
    Route::delete('/score/reset-game/{game}', [ScoreController::class, 'destroyGame'])->withTrashed();
});

Route::get('/game/{game}/{path}', [StaticController::class, 'index'])->withTrashed()->name('game.static')->where('path', '(.*)');
Route::resource('/api/v1/games/{game}/upload', UploadController::class);
