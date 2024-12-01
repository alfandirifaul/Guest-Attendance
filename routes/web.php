<?php

use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/guests/create', [GuestController::class, 'create'])->name('guests.create');

Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');

Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');

Route::post('/guests/store', function (Request $request){
    Mail::send(new \App\Mail\GuestRegisteredMail($request));
    return redirect('/');
});

Route::get('guests/all', [GuestController::class, 'showAll'])->name('guests.showAll');

Route::get('guests/{id}', [GuestController::class, 'showPersonal'])->name('guests.showPersonal');

Route::fallback(function () {
    return redirect()->route('guests.create');
});


