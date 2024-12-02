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


//Dashboard
Route::get('/dashboard', [GuestController::class, 'dashboard'])
    ->name('dashboard');

//Show All Guests List
Route::get('/dashboard/all', [GuestController::class, 'showAll'])
    ->name('guests.showAll');

//Show Weekly Guests List
Route::get('/dashboard/weekly', [GuestController::class, 'weeklyGuests'])
    ->name('guests.weekly');

//Show Monthly Guests List
Route::get('/dashboard/monthly', [GuestController::class, 'monthlyGuests'])
    ->name('guests.monthly');

//Show Yearly Guests List
Route::get('/dashboard/yearly', [GuestController::class, 'yearlyGuests'])
    ->name('guests.yearly');

//Show Detail Guests
Route::get('guests/{id}', [GuestController::class, 'showPersonal'])->name('guests.showPersonal');


Route::fallback(function () {
    return redirect()->route('guests.create');
});
