<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MechanicResource extends JsonResource
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
            'name' => $this->name,
            'worked_hours' => $this->worked_hours,
            'hour_value' => $this->hour_value,
            'comission' => $this->comission,
        ];
    }
}
