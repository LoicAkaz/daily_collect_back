<?php

use App\Http\Controllers\api\clientController;
use App\Http\Controllers\api\transactionController;
use App\Http\Controllers\api\userController ;
use App\Http\Controllers\resources\clientController as ResourceClient;
use App\Http\Controllers\resources\transactionController as ResourceTransaction;
use App\Http\Controllers\resources\userController as ResourceUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource("user", userController::class);
Route::apiResource("transaction", transactionController::class);
Route::apiResource("client", clientController::class);

Route::get("/user.list", [ResourceUser::class, 'index']);
Route::post("/user.store", [ResourceUser::class, 'store']);

// Route::get('/usersView',[userController::class,'index'])->name('user.index');

// Route::controller( userController::class)->group(function (){
//     Route::get('/user',function(){
//         return view('user.index');
//     });
// });
