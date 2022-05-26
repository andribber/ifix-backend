<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Http\Resources\VehicleResourceAll;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicles()
    {
        return VehicleResourceAll::collection(Vehicle::all());
    }

    public function create(Request $request, $id)
    {
        $client = Client::find($id);

        $attributes = $request->validate([
            'model' => 'required',
            'year' => 'required',
            'license_plate' => 'required',
            'manufacturer' => 'required',
        ]);

        $client->cars()->create($attributes);
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $attributes = $request->all();
        $vehicle->update($attributes);
    }

    public function delete($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
    }
}
