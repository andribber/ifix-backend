<?php

use App\Models\Client;
use App\Models\Mechanic;
use App\Models\Part;
use App\Models\ServiceOrder;
use App\Models\Vehicle;
use Carbon\Carbon;
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
    $client = Client::factory()->create();
    $vehicle = Vehicle::factory()->for($client)->create();
    $mechanic = Mechanic::factory()->create();
    $services = ServiceOrder::factory(2)->create([
        'client_id' => $client->id,
        'mechanic_id' => $mechanic->id,
        'vehicle_id' => $vehicle->id,
    ]);
    $services->each(function (ServiceOrder $order) {
        Part::factory(3)->for($order)->create();
    });

    $client2 = Client::factory()->create();
    $vehicle2 = Vehicle::factory()->for($client)->create();
    $mechanic2 = Mechanic::factory()->create();
    $services2 = ServiceOrder::factory(2)->create([
        'client_id' => $client2->id,
        'mechanic_id' => $mechanic2->id,
        'vehicle_id' => $vehicle2->id,
    ]);
    $services2->each(function (ServiceOrder $order) {
        Part::factory(3)->for($order)->create();
    });
});
