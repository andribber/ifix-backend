<?php

namespace App\Http\Controllers;

use App\Enums\ServiceOrders\Status;
use App\Http\Resources\ServiceOrderResource;
use App\Http\Resources\ServiceOrdersAllResource;
use App\Models\Mechanic;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

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

        $mechanic->update(['comission' => number_format($totalValue*0.10, 2, '.')]);
        $serviceOrder->update(['total_value' => $totalValue]);

        return new ServiceOrderResource($serviceOrder);
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'client' => 'required',
            'vehicle_name' => 'required',
            'chassi' => 'required|unique:service_orders',
            'year' => 'required',
            'license_plate' => 'required|unique:service_orders',
            'description' => 'required',
        ]);
        $validated = array_merge($attributes, ['status' => Status::INITIAL]);

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

    private function getTotalValue(Mechanic $mechanic, $parts): string
    {
        $mechanicValue = $mechanic->worked_hours * $mechanic->hour_value;
        foreach($parts as $part){
            $arrayPartValue[] = $part->value;
        }
        $partsValue = array_sum($arrayPartValue);

        return $mechanicValue + $partsValue;
    }
}
