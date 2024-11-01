<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\NoAjaxController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('no-ajax');
});

Route::prefix('no-ajax')->group(function () {
    Route::get('/', [NoAjaxController::class, 'index'])->name('no-ajax');
    Route::get('/api', [NoAjaxController::class, 'api_show'])->name('no-ajax.api');
    Route::post('/api', [NoAjaxController::class, 'api_store'])->name('no-ajax.api');
    Route::get('/db', [NoAjaxController::class, 'db_show'])->name('no-ajax.db');
    Route::post('/db', [NoAjaxController::class, 'db_store'])->name('no-ajax.db');
    Route::post('/save', [NoAjaxController::class, 'save_city'])->name('no-ajax.save');
});

Route::prefix('ajax')->group(function () {
    Route::get('/', [AjaxController::class, 'index'])->name('ajax');
});