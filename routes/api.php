<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware('guest')
            ->name('register');

        Route::post('/login', [AuthController::class, 'login'])
            ->middleware('guest')
            ->name('login');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->middleware('auth:sanctum')
            ->name('logout');

        Route::get('/me', [AuthController::class, 'me'])
            ->middleware('auth:sanctum')
            ->name('me');
    });
});

Route::post('test', function (Request $request) {
    return response()->json([
        'message' => $request->all(),
    ]);
});
