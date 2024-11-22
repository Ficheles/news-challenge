<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CategoryController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['api']], function () {
    Route::get('news/search', [NewsController::class, 'search']);
    Route::apiResource('news', NewsController::class);

    Route::get('categories/list', [CategoryController::class, 'list']);
    Route::apiResource('categories', CategoryController::class);
});


