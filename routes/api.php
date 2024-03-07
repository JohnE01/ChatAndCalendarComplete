<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TravelController;
use App\Http\Controllers\Api\ApiEventsDataController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/travel-data', [TravelController::class, 'index']);
Route::get('/travel-data/{id}', [TravelController::class, 'show']);
Route::post('/travel-data', [TravelController::class, 'store']);
Route::put('/travel-data/{id}', [TravelController::class, 'update']);
Route::delete('/travel-data/{id}', [TravelController::class, 'destroy']);

Route::get('/events-data', [ApiEventsDataController::class, 'index']);
Route::get('/events-data/{id}', [ApiEventsDataController::class, 'show']);
