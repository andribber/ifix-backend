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
            'client' => new ClientResource($this->client),
            'mechanic' => new MechanicResource($this->mechanic),
            'parts' => PartResource::collection($this->parts),
            'status' => $this->status,
            'description' => $this->description,
            'total_value' => $this->total_value,
            'created_at' => $this->created_at,
        ];
    }
}
