<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/**
 * Laravel ui routes
 */
Auth::routes();

Route::get('/', function () {
    return Inertia::render('Home', []);
});

// Route::post('/custom', [CustomController::class, 'index'])->name('custom');
