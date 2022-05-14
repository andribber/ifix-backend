<?php

use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/service-orders', function () {
    return ServiceOrder::all();
});

Route::get('/service-orders/{id}', function ($id) {
    return ServiceOrder::findOrFail($id);
});

Route::post('/service-orders', function (Request $request) {
    $attributes = [
        'client' => $request->client,
        'vehicle_name' => $request->vehicle_name,
        'chassi' => $request->chassi,
        'year' => $request->year,
        'license_plate' => $request->license_plate,
        'status' => $request->status,
        'description' => $request->description,
    ];

    ServiceOrder::create($attributes);
});

/*
    WORK IN PROGRESS PLEASE DO NOT USE
*/
Route::patch('/service-orders/{id}', function (Request $request, $id) {
    $os = ServiceOrder::findOrFail($id);
    $attributes = [
        'client' => $request->client,
        'vehicle_name' => $request->vehicle_name,
        'chassi' => $request->chassi,
        'year' => $request->year,
        'license_plate' => $request->license_plate,
        'status' => $request->status,
        'description' => $request->description,
    ];

    $os->update($attributes);
});

Route::delete('/service-orders/{id}', function ($id) {
    $os = ServiceOrder::findOrFail($id);
    $os->delete();
});