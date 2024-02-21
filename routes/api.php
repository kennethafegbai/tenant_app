<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['domain'=>'{subdomain}.localhost'], function(){
//     Route::middleware(['api'])->group(function () {
//         Route::get('users', [UserController::class, 'index']);
//     });
// });

// Retrieved each tenant details
Route::middleware(['api','tenantCheck'])->domain('{subdomain}.localhost')->group(function(){
    Route::get('users', [UserController::class, 'index']);
});


Route::middleware(['api'])->domain('localhost')->group(function(){
    Route::get('users', [UserController::class, 'dashboard']);
    Route::post('create', [UserController::class, 'store']);
});

