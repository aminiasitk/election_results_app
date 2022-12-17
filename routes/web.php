<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\Venue\VenueController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::resource('party', PartyController::class);
    Route::group(['prefix' => 'party'], function() {
        Route::get('/', [PartyController::class, 'index'])->name('party.index');
        Route::get('/create', [PartyController::class, 'create'])->name('party.create');
        Route::post('/store', [PartyController::class, 'store'])->name('party.store');
        Route::get('/{party}/edit', [PartyController::class, 'edit'])->name('party.edit');
        Route::post('/{party}/update', [PartyController::class, 'update'])->name('party.update');
        Route::get('/{party}/delete', [PartyController::class, 'destroy'])->name('party.delete');
    });

    // Route::resource('party', PartyController::class);
    Route::group(['prefix' => 'venue'], function() {
        Route::get('/', [VenueController::class, 'index'])->name('venue.index');
        Route::get('/create', [VenueController::class, 'create'])->name('venue.create');
        Route::post('/store', [VenueController::class, 'store'])->name('venue.store');
        Route::get('/{party}/edit', [VenueController::class, 'edit'])->name('venue.edit');
        Route::post('/{party}/update', [VenueController::class, 'update'])->name('venue.update');
        Route::get('/{party}/delete', [VenueController::class, 'destroy'])->name('venue.delete');
    });
});

require __DIR__.'/auth.php';
