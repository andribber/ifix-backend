<?php

namespace App\Http\Controllers;

use App\Http\Resources\MechanicResource;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function create(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:mechanics',
            'worked_hours' => 'integer',
            'hour_value' => 'required|integer',
        ]);

        Mechanic::create($attributes);
    }

    public function index()
    {
        return MechanicResource::collection(Mechanic::all());
    }

    public function show($id)
    {
        $mechanic = Mechanic::find($id);

        if (! is_null($mechanic?->worked_hours) && ! is_null($mechanic?->hour_value))
        {
            $mechanic->update([
                'comission' => ($mechanic->worked_hours*$mechanic->hour_value)*0.10,
            ]);
        }

        return new MechanicResource($mechanic);
    }

    public function update(Request $request, $id)
    {
        $mechanic = Mechanic::find($id);

        $attributes = $request->all();

        $mechanic->update($attributes);
    }

    public function delete($id)
    {
        $mechanic = Mechanic::find($id);

        $mechanic->delete();
    }
}
