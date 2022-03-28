<?php

use App\Http\Controllers\Application\SheetController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'sheet'], function () {

    Route::get('/', [SheetController::class, 'index'])->name('home');
});
