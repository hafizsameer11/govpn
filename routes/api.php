<?php

use App\Http\Controllers\Api\ApiPlanController;
use App\Http\Controllers\Api\OVPNFileApiController;
use App\Http\Controllers\Api\ServerApiController;
use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Http\Request;
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
Route::middleware('throttle:120,1')->group(function () {
    Route::get('servers', [ServerApiController::class, 'index']);
    Route::get('ovpn-file/{serverId}', [OVPNFileApiController::class, 'getOvpnFile']);
});
Route::post('disconnect', [OVPNFileApiController::class, 'disconnect']);
Route::get('plans', [ApiPlanController::class, 'index']);
Route::get('countryflag', [ServerApiController::class, 'countryflag']);

Route::post('subscribe', [SubscriptionController::class, 'store']);
Route::post('checksubscription', [SubscriptionController::class, 'checksubscription']);
