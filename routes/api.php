<?php

use App\Enums\ServiceOrders\Status;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ServiceOrdersController;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Service Orders Controllers
Route::get('/service-orders', [ServiceOrdersController::class, 'view']);
Route::get('/service-orders/{id}', [ServiceOrdersController::class, 'show']);
Route::post('/service-orders', [ServiceOrdersController::class, 'create']);
Route::post('/service-orders/{id}', [ServiceOrdersController::class, 'update']);
Route::delete('/service-orders/{id}', [ServiceOrdersController::class, 'delete']);

// Common things controller
Route::get('/status', [CommonController::class, 'status']);
Route::get('/clients', [CommonController::class, 'clients']);