<?php

use App\Http\Controllers\ScrapperController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('courses.index'))->name('home');

Route::prefix('courses')->controller(ScrapperController::class)->name('courses.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/start', 'startScrapperQueue');
    Route::post('/stop', 'stopScrapperQueue');
});
