<?php

use App\Models\Mechanic;
use App\Models\ServiceOrder;
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
    $mechanic = Mechanic::factory()->create();
    ServiceOrder::factory(2)->for($mechanic)->create();

    $mechanic2 = Mechanic::factory()->create();
    ServiceOrder::factory(2)->for($mechanic2)->create();
});
