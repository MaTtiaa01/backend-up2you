<?php

use App\Http\Controllers\AttendeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Middleware\ApiKeyMiddleware;

Route::middleware([ApiKeyMiddleware::class])->group(function () {
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::post('/', [EventController::class, 'store']);
        Route::get('/{id}', [EventController::class, 'show']);
        Route::put('/{id}', [EventController::class, 'update']);
        Route::delete('/{id}', [EventController::class, 'destroy']);
        Route::post('/new',[EventController::class, 'store']);
    });

    Route::prefix('attendees')->group(function () {
        Route::get('/', [AttendeeController::class, 'index']);
        Route::post('/', [AttendeeController::class, 'store']);
        Route::get('/{id}', [AttendeeController::class, 'show']);
        Route::put('/{id}', [AttendeeController::class, 'update']);
        Route::delete('/{id}', [AttendeeController::class, 'destroy']);
        Route::post('/register',[AttendeeController::class, 'register']);
    });

});

