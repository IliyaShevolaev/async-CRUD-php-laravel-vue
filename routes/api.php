<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'notes'], function () {
    Route::get('/index', [NoteController::class, 'index']);
    Route::post('/store', [NoteController::class, 'store']);
    Route::patch('/update/{note}', [NoteController::class, 'update']);
});
