<?php

use App\Http\Controllers\api\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource("user", userController::class);

