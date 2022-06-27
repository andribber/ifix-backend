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
    ServiceOrder::factory(2)->create([
        'client_id' => $client->id,
        'vehicle_id' => $vehicle->id,
    ]);

    $client2 = Client::factory()->create();
    $vehicle2 = Vehicle::factory()->for($client2)->create();
    ServiceOrder::factory(2)->create([
        'client_id' => $client2->id,
        'vehicle_id' => $vehicle2->id,
    ]);
});
