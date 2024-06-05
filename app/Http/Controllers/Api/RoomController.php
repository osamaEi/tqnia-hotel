<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
 
    public function search()
    {
        $rooms = Room::with('roomType')->where('status', 'available')->get();


        return RoomResource::collection($rooms);
    }
 
}
