<?php

namespace App\Http\Controllers;

use App\Enums\ServiceOrders\Status;
use App\Http\Resources\ServiceOrderResource;
use App\Http\Resources\ServiceOrdersAllResource;
use App\Models\Mechanic;
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
        $mechanic = $serviceOrder->mechanic;

        $totalValue = $this->getTotalValue($mechanic, $serviceOrder->parts);
        if (! is_null($totalValue)) {
            $mechanic->update(['comission' => number_format($totalValue*0.10, 2, '.')]);
            $serviceOrder->update(['total_value' => $totalValue]);
        }

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

    private function getTotalValue(?Mechanic $mechanic, ?Collection $parts): ?string
    {
        $arrayPartValue = [];

        if(! is_null($mechanic) && ! is_null($parts)) {
            $mechanicValue = $mechanic->worked_hours * $mechanic->hour_value;

            foreach($parts as $part){
                $arrayPartValue[] = $part->value;
            }

            $partsValue = array_sum($arrayPartValue);

            return $mechanicValue + $partsValue;
        }

        return null;
    }
}
