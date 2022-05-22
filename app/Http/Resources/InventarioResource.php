<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventarioResource extends JsonResource
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
            'id'=> $this->id,
            'ubicacion'=> $this->ubicacion,
            'cantidad'=> $this->cantidad,
            'instrumento_id'=> $this->Instrumentos->descripcion,
            'created_at'=> $this->created_at->toFormattedDateString()


        ];
    }
}
