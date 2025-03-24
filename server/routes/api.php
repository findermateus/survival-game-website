<?php

use App\Http\Controllers\AccountController;
use \App\Http\Controllers\NPCController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Survival Game Server API';
});
Route::post('/account', [AccountController::class, 'createAccount']);
Route::post('/login', [AccountController::class, 'login']);

const authMiddleware = 'auth:sanctum';

Route::middleware(authMiddleware)->group(function () {
    Route::post('/npc', [NPCController::class, 'createNPC']);
    Route::get('/npc', [NPCController::class, 'getNPC']);
    Route::put('/npc', [NPCController::class, 'updateNpc']);
});

