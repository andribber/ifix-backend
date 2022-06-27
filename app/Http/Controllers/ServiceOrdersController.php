<?php

namespace App\Http\Controllers;

use App\Enums\ServiceOrders\Status;
use App\Http\Resources\ServiceOrderResource;
use App\Http\Resources\ServiceOrdersAllResource;
use App\Models\ServiceOrder;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ServiceOrdersController extends Controller
{
    public function view()
    {
        return ServiceOrdersAllResource::collection(ServiceOrder::all());
    }

    public function show($id): ServiceOrderResource
    {
        $serviceOrder = ServiceOrder::find($id);

        return new ServiceOrderResource($serviceOrder);
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'vehicle_id' => 'required',
            'description' => 'required',
        ]);

        $vehicle = Vehicle::find($request['vehicle_id']);

        $validated = array_merge($attributes, [
            'status' => Status::INITIAL,
            'client_id' => $vehicle->client->id,
        ]);

        ServiceOrder::create($validated);
    }

    public function update(Request $request, $id)
    {
        $serviceOrder = ServiceOrder::find($id);
        $attributes = $request->all();
        $serviceOrder->update($attributes);
    }

    public function delete($id)
    {
        $serviceOrder = ServiceOrder::find($id);
        $serviceOrder->delete();
    }
}
