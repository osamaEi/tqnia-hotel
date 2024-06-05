<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookRoom(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Check if the room is available
        $room = Room::find($request->room_id);
        if ($room->status !== 'available') {
            return response()->json(['message' => 'Room is not available'], 400);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'status' => 'Pending',
        ]);

        $room->update(['status' => 'Pending']);

        return response()->json(['message' => 'Booking request submitted successfully', 'booking' => $booking], 201);
    }
}

