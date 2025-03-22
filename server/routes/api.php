<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return 'Hello World';
});

Route::post('/account', [AccountController::class, 'createAccount']); //->middleware('auth:sanctum');
Route::post('/login', [AccountController::class, 'login']);
