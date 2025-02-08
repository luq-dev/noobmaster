<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/signup', [AuthController::class, 'signup']);

Route::post('/loginh', [AuthController::class, 'login'])->name('login_handler');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/img/{id}', [GameController::class, 'img'])->name('game.img');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [GameController::class, 'admin'])->name('admin_dashboard');

    Route::post('/deletegame/{id}', [GameController::class, 'delete'])->name('delete_game');

    Route::post('/addgame', [GameController::class, 'add']);

    Route::get('/g/{id}', [UserController::class, 'game']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [GameController::class, 'home'])->name('home');

    Route::get('/c/{game_id}', [AuthController::class, 'showForum'])->name('community.show');


    Route::get('/u/{username}', [AuthController::class, 'profile'])->name('profile.show');

    Route::post('/deluser', [UserController::class, 'delete'])->name('delete_user');
});
