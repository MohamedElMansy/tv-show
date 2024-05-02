<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Show\ShowController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Register routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::group(['middleware' => ['auth']], function () {
    //Home Page
    Route::get('/', [HomeController::class , 'index'])->name('home');
    //Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    //Shows
    Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
    Route::get('/top-shows', [ShowController::class, 'getTopShows'])->name('shows.top');
    Route::get('/shows/{id}', [ShowController::class, 'show'])->name('shows.show');
    //Episode
    Route::get('shows/{showId}/episodes/{episodeNumber}', [ShowController::class, 'getEpisode']);
});
