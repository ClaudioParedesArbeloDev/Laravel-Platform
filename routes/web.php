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

    Route::get('/blogs', [BlogController::class, 'index'])
        ->name('blogs');
    
    Route::get('/blogs/{id}', [BlogController::class, 'show'])
        ->name('blog');
    
    Route::get('/blogs/create', [BlogController::class, 'create'])
        ->name('create-blog');
    
    Route::post('/blogs', [BlogController::class, 'store'])
        ->name('store-blog');
    
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])
        ->name('edit-blog');
    
    Route::put('/blogs/{id}', [BlogController::class, 'update'])
        ->name('update-blog');
    
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])
        ->name('delete-blog');
    
});
