<?php

use App\Http\Controllers\Api\FinanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('finance')->group(function () {
    Route::get('/', [FinanceController::class, 'index'])->name('finance.index');
    Route::get('/{id}', [FinanceController::class, 'show'])->name('finance.show');
    Route::post('/', [FinanceController::class, 'create'])->name('finance.create');
    Route::put('/{id}', [FinanceController::class, 'update'])->name('finance.update');
    Route::delete('/{id}', [FinanceController::class, 'delete'])->name('finance.delete');
});