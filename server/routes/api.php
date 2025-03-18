<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request){
    return 'Hello World';
});

Route::get('/test', function (Request $request){
    return 'teste';
});