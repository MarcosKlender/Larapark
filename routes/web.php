<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\VehiclesController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [VehiclesController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::post('/vehicles/close', [VehiclesController::class, 'close'])->name('vehicles.close');
Route::resource('vehicles', VehiclesController::class);

Route::resource('rates', RatesController::class);

Route::post('/history/search', [HistoryController::class, 'search'])->name('history.search');
Route::resource('history', HistoryController::class);
