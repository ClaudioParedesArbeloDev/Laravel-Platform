<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

use App\Http\Middleware\LocaleCookie;



Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
}); 

Route::middleware(LocaleCookie::class)->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/login', [LoginController::class, 'login'])
        ->name('login');

    Route::get('/users', [UsersController::class, 'index'])
        ->name('users.index');

    Route::get('/users/create', [UsersController::class, 'create'])
        ->name('users.create');

    Route::post('/users', [UsersController::class, 'store'])
        ->name('users.store');

    Route::get('/users/{id}', [UsersController::class, 'show'])
        ->name('users.show');

    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])
        ->name('users.edit');

    Route::put('/users/{id}', [UsersController::class, 'update'])
        ->name('users.update');

    Route::delete('/users/{id}', [UsersController::class, 'destroy'])
        ->name('users.destroy');
});
