<?php

use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user/'], function (){
    Route::middleware('guest')->group(function () {
        Route::post('login', [UserLoginController::class, 'login']);

        Route::post('register', [UserRegisterController::class, 'register']);
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', [UserRegisterController::class, 'destroy']);
    });
});
