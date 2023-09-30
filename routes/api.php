<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lead;
use App\Http\Controllers\LeadController;

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

Route::group(['prefix'=>'leads'], function () {
    Route::get('/', [LeadController::class, 'index']);
    Route::get('/{id}', [LeadController::class, 'show']);
    Route::post('/', [LeadController::class, 'store']);
    Route::put('/{id}', [LeadController::class, 'update']);
    Route::delete('/{id}', [LeadController::class, 'destroy']);
});