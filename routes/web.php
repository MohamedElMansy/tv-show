<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Show\ShowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Episode\EpisodeController;
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
    Route::post('/shows/{id}/follow', [ShowController::class, 'followShow'])->name('shows.follow');
    Route::delete('/shows/{id}/unfollow', [ShowController::class, 'unfollowShow'])->name('shows.unfollow');
    //Episode
    Route::get('/shows/{showId}/episodes/{episodeNumber}', [EpisodeController::class, 'getEpisode']);
    Route::post('/shows/{showId}/episodes/{episodeNumber}/like', [EpisodeController::class, 'likeEpisode'])->name('episodes.like');
    Route::delete('/shows/{showId}/episodes/{episodeNumber}/dislike', [EpisodeController::class, 'dislikeEpisode'])->name('episodes.dislike');
    //Search
    Route::get('/search', [SearchController::class, 'search'])->name('search');
});
