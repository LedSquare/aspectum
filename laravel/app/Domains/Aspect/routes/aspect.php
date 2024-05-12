<?php

use Aspect\Http\Controllers\AspectController;
use Illuminate\Support\Facades\Route;


Route::controller(AspectController::class)
    ->name('aspect')
    ->middleware('auth')
    ->group(function () {
        Route::get('get-aspect-step', 'getStep')->name('.get');
        Route::post('next-aspect-step', 'nextStep')->name('.post');
    });
