<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 23232323;
});
Route::get('/', function () {
    return view('Frontend::welcome');
});
