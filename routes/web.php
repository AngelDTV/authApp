<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function (){
    Route::get('login', function () {
        return view('login-view');
    })->name('login');

    Route::get('/register', function () {
        return view('register-view');
    });
});


Route::get('home', function () {
    return view('home-view')->with('user', Auth::user());
})->middleware('auth');

Route::get('code/{email}', function ($email) {
    return view('code-view')->with('email', $email);
})->name('code');



Route::fallback(function () {
    return redirect('/login');
});


