<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('expenses', ExpenseController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);
});
