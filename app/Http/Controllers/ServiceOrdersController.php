<?php

namespace App\Http\Controllers;

use App\Enums\ServiceOrders\Status;
use App\Http\Resources\ServiceOrderResource;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrdersController extends Controller
{
    public function view()
    {
        return ServiceOrder::all();
    }

    public function show($id): ServiceOrderResource
    {
        $serviceOrder = ServiceOrder::find($id);
        $mechanic = $serviceOrder->mechanic;

        $totalValue = $mechanic->worked_hours * $mechanic->worked_hours;

        $mechanic->update(['comission' => $totalValue*0.10]);
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
}
