<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\LocaleCookie;
use App\Mail\ContactMailable;



Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
});

Route::middleware(LocaleCookie::class)->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    //Routes of users
    Route::get('/users', [UsersController::class, 'index'])
        ->name('users.index')->middleware('auth');
    
    Route::get('/users/create', [UsersController::class, 'create'])
        ->name('users.create');
    
    Route::post('/users', [UsersController::class, 'store'])
        ->name('users.store');
    
    Route::get('/users/{id}', [UsersController::class, 'show'])
        ->name('users.show')->middleware('auth');
    
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])
        ->name('users.edit')->middleware('auth');

    Route::put('/users/{id}', [UsersController::class, 'update'])
        ->name('users.update')->middleware('auth');

    Route::delete('/users/{id}', [UsersController::class, 'destroy'])
        ->name('users.destroy')->middleware('auth');

    //Routes of blogs
    Route::get('/blogs', [BlogController::class, 'index'])
        ->name('blogs.index');
    
    Route::get('/blogs/create', [BlogController::class, 'create'])
        ->name('blogs.create')->middleware('auth');
    
    Route::post('/blogs', [BlogController::class, 'store'])
        ->name('blogs.store')->middleware('auth');
    
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])
        ->name('blogs.show');
    
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])
        ->name('blogs.edit')->middleware('auth');

    Route::put('/blogs/{id}', [BlogController::class, 'update'])
        ->name('blogs.update')->middleware('auth');

    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])
        ->name('blogs.destroy')->middleware('auth');
    
    //Routes of courses
    Route::get('/courses', [CoursesController::class, 'index'])
        ->name('courses.index');
    
    Route::get('/courses/create', [CoursesController::class, 'create'])
        ->name('courses.create')->middleware('auth');
    
    Route::post('/courses', [CoursesController::class, 'store'])
        ->name('courses.store')->middleware('auth');
    
    Route::get('/courses/{id}', [CoursesController::class, 'show'])
        ->name('courses.show');
    
    Route::get('/courses/{id}/edit', [CoursesController::class, 'edit'])
        ->name('courses.edit')->middleware('auth');

    Route::put('/courses/{id}', [CoursesController::class, 'update'])
        ->name('courses.update')->middleware('auth');

    Route::delete('/courses/{id}', [CoursesController::class, 'destroy'])
        ->name('courses.destroy')->middleware('auth');

    Route::get('/cursos', [CoursesController::class, 'cursos'])
        ->name('cursos');

    Route::get('/cursos/{id}', [CoursesController::class, 'cursoDetail'])
        ->name('cursos.detail');
        
    //Route of logins
    Route::get('/login', [LoginController::class, 'login'])
        ->name('login')->middleware('guest');
    
    Route::post('login', [LoginController::class, 'store'])
        ->name('login.store');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/register', [LoginController::class, 'register'])
        ->name('register')->middleware('guest');
    
    Route::get('/check-username', [UsersController::class, 'checkUsername'])
        ->name('check-username');


    //Routes of home
    Route::get('/aboutus', [AboutUsController::class, 'index'])
        ->name('aboutus');

    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact.index');

    Route::post('/contact', [ContactController::class, 'store'])
        ->name('contact.store');

    Route::get('/success', function () {
        return view('users.success');
    });
        


    //Routes of dashboard

    Route::get('/dashboard/admin', [AdminController::class, 'index'])
        ->name('admin')->middleware('auth');

    Route::view('dashboard','dashboard.dashboard')->middleware('auth');

    Route::get('/dashboard/perfil', [ProfileController::class, 'edit'])
        ->name('profile.edit')->middleware('auth');
    
    Route::put('/dashboard/update', [ProfileController::class, 'update'])
        ->name('profile.update')->middleware('auth');
    
    //Payment

    Route::post('courses/enroll', [CoursesController::class, 'enroll'])->name('courses.enroll');
    

});


