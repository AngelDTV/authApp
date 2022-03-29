<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');
    Route::post('register', [AuthController::class, 'register']);
    Route::post('code/login-with-code', [AuthController::class, 'loginWithCode']);
    Route::get('verify-email', [AuthController::class, 'verifyEmail'])->name('verifyEmail');
    Route::post('file', [AuthController::class, 'file']);
});

