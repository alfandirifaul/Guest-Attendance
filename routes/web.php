<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/guests/create', [GuestController::class, 'create'])->name('guests.create');

Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');

Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');

Route::get('guests/all', [GuestController::class, 'showAll'])->name('guests.showAll');

Route::fallback(function () {
    return redirect()->route('guests.create');
});


