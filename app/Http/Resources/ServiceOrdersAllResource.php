<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceOrdersAllResource extends JsonResource
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
            'year' => $this->year,
            'license_plate' => $this->license_plate,
            'status' => $this->status,
        ];
    }
}
