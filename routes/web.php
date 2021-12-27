<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\CarController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/{id}', function ($id) {
        return response(User::find($id)->name);
    });
    Route::apiResource('cars', CarController::class);
});

Route::post('/tokens/create', [ApiTokenController::class, 'createToken'])->name('tokensCreate');
