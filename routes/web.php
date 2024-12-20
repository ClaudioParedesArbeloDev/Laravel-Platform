<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\LocaleCookie;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix(('{locale}'))->middleware(SetLocale::class)->group(function () {
    Route::get('/subscribe', function () {
        return __('Home');
    });
});


Route::get('/locale/{locale}', function ($locale) {
    return redirect()->back()->withCookie('locale', $locale);
});

Route::middleware(LocaleCookie::class)->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
});