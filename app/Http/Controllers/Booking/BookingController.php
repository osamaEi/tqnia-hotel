<?php

namespace App\Http\Controllers\Booking;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'room.roomType'])->get();

        return view('backend.booking.index', compact('bookings'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $booking->update(['status' => $request->status]);

        if ($request->status === 'Approved') {
            $booking->room->update(['status' => 'booked']);
        } elseif ($request->status === 'Rejected') {
            $booking->room->update(['status' => 'available']);
        }

        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated successfully.');
    }
}
