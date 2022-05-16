<?php

namespace App\Http\Resources;

use App\Models\Mechanic;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'client' => $this->client,
            'vehicle_name' => $this->vehicle_name,
            'chassi' => $this->chassi,
            'year' => $this->year,
            'license_plate' => $this->license_plate,
            'mechanic' => new MechanicResource($this->mechanic),
            'status' => $this->status,
            'description' => $this->description,
            'total_value' => $this->total_value,
            'created_at' => $this->created_at,
        ];
    }
}
