<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PrimaryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Group;




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('postagram')->group(function () {
    Route::get('/', [PostController::class, 'welcome'])->name('home');
    Route::get('create', [PostController::class, 'index'])->name('create.index');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/avatar', [PostController::class, 'avatar'])->name('user.avatar');
    Route::post('/avatar_store', [PostController::class, 'avatar_store'])->name('avatar.store');
});
Route::middleware('PrimaryMidleware')->group(function () {

    Route::prefix('roles-permissions')->group(function () {
        Route::get('/', [PrimaryController::class, 'index'])->name('roles-permissions');
        Route::post('/store_user', [PrimaryController::class, 'store_user'])->name('create_user');
        Route::post('/role_store', [PrimaryController::class, 'store_role'])->name('create_role');
        Route::post('/store_permission', [PrimaryController::class, 'store_permission'])->name('create_permission');
        Route::view('/table_user', 'roles-permissions.user_table')->name('table_user');
    });
});
require __DIR__ . '/auth.php';
