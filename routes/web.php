<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\LocaleCookie;
use App\Mail\ContactMailable;



Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
});

Route::middleware(LocaleCookie::class)->group(function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/login', [LoginController::class, 'login'])
        ->name('login');


   /*  Route::get('/contacts', function (){

        Mail::to('claudioparedesarbelo@gmail.com')
            ->send(new ContactMailable);

            return "Email sent successfully";

    }); */

    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact.index');

    Route::post('/contact', [ContactController::class, 'store'])
        ->name('contact.store');

    Route::resource('users', UsersController::class);

    Route::resource('blogs', BlogController::class);


});
