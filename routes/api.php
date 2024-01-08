<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PerKapitaExpendituresController;
use App\Http\Resources\PerKapitaExpendituresResource;
use App\Http\Requests\PerKapitaExpendituresRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/PerKapitaExpenditures', [PerKapitaExpendituresController::class, 'index']);
Route::get('/PerKapitaExpenditures/{id}', [PerKapitaExpendituresController::class, 'show']);
Route::put('/PerKapitaExpenditures/{id}', [PerKapitaExpendituresController::class, 'update']);
Route::post('/PerKapitaExpenditures', [PerKapitaExpendituresController::class, 'store']);
Route::delete('/PerKapitaExpenditures/{id}', [PerKapitaExpendituresController::class, 'destroy']);

