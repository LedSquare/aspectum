<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)->name('home')->group(function () {
    Route::get('/', 'index');
});

