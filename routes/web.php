<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

// registration guests
Route::get('/guests/create', [GuestController::class, 'create'])->name('guests.create');
Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');

// landing page
Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');

// sending email
Route::post('/guests/store', function (Request $request){
    Mail::send(new \App\Mail\GuestRegisteredMail($request));
    return redirect('/');
});

//********************* IF YOU WANT TO USE THE LOGIN PAGE FOR DASHBOARD, COMMENT CODE BELOW
//// Access Dashboard
//Route::get('/dashboard', [GuestController::class, 'dashboard'])
//    ->name('dashboard');
//
//// Show All Guests List
//Route::get('/dashboard/all', [GuestController::class, 'showAll'])
//    ->name('guests.showAll');
//
//// Show Weekly Guests List
//Route::get('/dashboard/weekly', [GuestController::class, 'weeklyGuests'])
//    ->name('guests.weekly');
//
//// Show Monthly Guests List
//Route::get('/dashboard/monthly', [GuestController::class, 'monthlyGuests'])
//    ->name('guests.monthly');
//
//// Show Yearly Guests List
//Route::get('/dashboard/yearly', [GuestController::class, 'yearlyGuests'])
//    ->name('guests.yearly');
//
//// Show Detail Guests
//Route::get('guests/{id}', [GuestController::class, 'showPersonal'])
//    ->name('guests.showPersonal');
//***********************************************************






//********************* IF YOU WANT TO USE THE LOGIN PAGE FOR DASHBOARD UNCOMMENT CODE BELOW
// Authentication Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');

    // Guest Lists
    Route::prefix('/dashboard')->group(function () {
        Route::get('/all', [GuestController::class, 'showAll'])->name('guests.showAll');
        Route::get('/weekly', [GuestController::class, 'weeklyGuests'])->name('guests.weekly');
        Route::get('/monthly', [GuestController::class, 'monthlyGuests'])->name('guests.monthly');
        Route::get('/yearly', [GuestController::class, 'yearlyGuests'])->name('guests.yearly');
    });

    // Guest Details
    Route::get('guests/{id}', [GuestController::class, 'showPersonal'])->name('guests.showPersonal');

    // Download to excel file
    Route::get('guests/export',[GuestController::class, 'exportGuests']
    )->name('guests.export');

    // Import excel file to database
    Route::post('guests/import', [GuestController::class, 'importGuests'])
        ->name('guests.import');
});
//***********************************************************

Route::fallback(function () {
    return redirect()->route('guests.index');
});
