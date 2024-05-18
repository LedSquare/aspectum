<?php

use Aspect\Http\Controllers\AspectController;
use Illuminate\Support\Facades\Route;


Route::controller(AspectController::class)
    ->name('aspect')
    ->middleware('auth')
    ->group(function () {
        Route::get('start', 'start')->name('.start');
        Route::get('get-step/{aspect}', 'getStep')->name('.get');
        Route::post('next-step/{aspect}', 'nextStep')->name('.post');
    });
