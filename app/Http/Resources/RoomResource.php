<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
           
            'room_name' => $this->room_name,
            'image' => $this->image,
            'description' => $this->description,
            'room_number' => $this->room_number,
            'status' => $this->status,
       
            'room_type' => new RoomTypeResource($this->whenLoaded('roomType')),
        ];
    }
}
