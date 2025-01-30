<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstructorController;
use App\Http\Middleware\LocaleCookie;
use App\Mail\ContactMailable;



Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
});

Route::middleware(LocaleCookie::class)->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/login', [LoginController::class, 'login'])
        ->name('login')->middleware('guest');
    
    Route::post('login', [LoginController::class, 'store'])
        ->name('login.store');
    
    Route::get('/register', [LoginController::class, 'register'])
        ->name('register')->middleware('guest');
    
    Route::get('/check-username', [UsersController::class, 'checkUsername'])
        ->name('check-username');
    

    Route::get('/aboutus', [AboutUsController::class, 'index'])
        ->name('aboutus');

    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact.index');

    Route::post('/contact', [ContactController::class, 'store'])
        ->name('contact.store');

    Route::resource('users', UsersController::class);

    Route::resource('blogs', BlogController::class);

    Route::resource('courses', CoursesController::class);

    Route::view('dashboard','dashboard.dashboard')->middleware('auth');
    
});


