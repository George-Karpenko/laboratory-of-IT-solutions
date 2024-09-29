<?php

use App\Http\Controllers\Api\SlideController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/slides', [SlideController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
