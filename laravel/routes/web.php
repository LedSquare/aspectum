<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('pages.start');
});

// Route::post('/custom', [CustomController::class, 'index'])->name('custom');
