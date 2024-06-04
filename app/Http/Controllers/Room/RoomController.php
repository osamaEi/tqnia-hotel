<?php

namespace App\Http\Controllers\Room;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
    {
      $rooms = Room::with('roomType')->get(); 
  
    return view('admin.room.index', compact('rooms')); 
    }

    public function create()
    {
        $roomTypes= RoomType::all();
      return view('admin.room.create',compact('roomTypes'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
     
    $validatedData = $request->validated();

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate unique filename
        $image->storeAs('public/images/rooms', $imageName); // Save image to storage

        // Update validated data with image path
        $validatedData['image'] = $imageName;
    }

    // Create the room with validated data
    $room = Room::create($validatedData);

    return redirect()->route('room.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomTypes= RoomType::all();
        $room = Room::find($id);
        return view('admin.room.edit',compact('roomTypes','room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, string $id)
    {
        $room = Room::findOrFail($id);
        $validatedData = $request->validated();
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($room->image) {
                Storage::delete('public/images/rooms/' . $room->image);
            }
    
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate unique filename
            $image->storeAs('public/images/rooms', $imageName); // Save image to storage
    
            // Update validated data with new image path
            $validatedData['image'] = $imageName;
        } else {
            // Keep the old image if no new image is uploaded
            $validatedData['image'] = $room->image;
        }
    
        // Update the room with validated data
        $room->update($validatedData);
    
        return redirect()->route('room.index')->with('success', 'Room updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        
        if ($room->image) {
            Storage::delete('public/images/rooms/' . $room->image);
        }
        
        $room->delete();
        
        return redirect()->route('room.index')->with('success', 'Room and its image deleted successfully!');
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:available,pending,booked',
    ]);

    $room = Room::findOrFail($id);
    $room->status = $request->status;
    $room->save();

    return redirect()->back();
}

}
