<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;

// Route::post('register', [AuthController::class,'register'])->name('register');
// Route::post('login', [AuthController::class,'login'])->name('login');
// Route::post('logout', [AuthController::class,'logout'])->name('logout');
// Route::get('user', [AuthController::class,'user'])->name('user');


Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::get('user', [AuthController::class,'user'])->name('user');
});

Route::group([
    'middleware'=>'api',
    // 'prefix'=>'topic'
], function () {
    Route::resource('/topic', TopicController::class);
});

// Route::resource('/topic', TopicController::class, ['except' => ['index']]);
