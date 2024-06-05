<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingEmployeeController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'room.roomType'])->get();

        return view('admin.booking.index', compact('bookings'));
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
    }}
