<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware\LocaleCookie;



Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
}); 

Route::middleware(LocaleCookie::class)->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/login', [LoginController::class, 'login'])
        ->name('login');

    Route::resource('users', UsersController::class);

    Route::resource('blog', BlogController::class);
});
