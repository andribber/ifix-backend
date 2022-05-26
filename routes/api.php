<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ServiceOrdersController;
use Illuminate\Support\Facades\Route;

// service orders controller
Route::get('/service-orders', [ServiceOrdersController::class, 'view']);
Route::get('/service-orders/{id}', [ServiceOrdersController::class, 'show']);
Route::post('/service-orders', [ServiceOrdersController::class, 'create']);
Route::post('/service-orders/{id}', [ServiceOrdersController::class, 'update']);
Route::delete('/service-orders/{id}', [ServiceOrdersController::class, 'delete']);

//client controller
Route::get('/clients', [ClientController::class, 'clients']);
Route::get('/clients/{id}', [ClientController::class, 'show']);
Route::post('/clients', [ClientController::class, 'create']);
Route::post('/clients/{id}', [ClientController::class, 'update']);
Route::delete('/clients/{id}', [ClientController::class, 'delete']);

// common things controller
Route::get('/status', [CommonController::class, 'status']);
