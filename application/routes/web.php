<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::resource('news', NewsController::class);
Route::get('news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::resource('categories', CategoryController::class);
