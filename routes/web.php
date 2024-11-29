<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\GuestController;

Route::get('/', function () {
    return view('welcome');
});
