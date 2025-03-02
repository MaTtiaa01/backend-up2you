<?php
// filepath: /Users/mattiabarbieri/Documents/backend-up2you/routes/api.php

use App\Http\Controllers\AttendeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;

Route::middleware(function (Request $request, $next) {
    $apiKey = $request->header('API_KEY');

    if ($apiKey !== env('API_KEY')) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    return $next($request);
})->group(function () {
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::post('/', [EventController::class, 'store']);
        Route::get('/{id}', [EventController::class, 'show']);
        Route::put('/{id}', [EventController::class, 'update']);
        Route::delete('/{id}', [EventController::class, 'destroy']);
    });

    Route::prefix('attendees')->group(function () {
        Route::get('/', [AttendeeController::class, 'index']);
        Route::post('/', [AttendeeController::class, 'store']);
        Route::get('/{id}', [AttendeeController::class, 'show']);
        Route::put('/{id}', [AttendeeController::class, 'update']);
        Route::delete('/{id}', [AttendeeController::class, 'destroy']);
    });
});

