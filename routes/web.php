<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/filmes', \App\Tickets\GetMoviesAction::class)->name('movies.index');
Route::get('/filmes/{movie}', \App\Tickets\GetMovieAction::class)->name('movies.show');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/bookings/{movieSession}', \App\Tickets\BookingAction::class)->name('bookings.store');
});
