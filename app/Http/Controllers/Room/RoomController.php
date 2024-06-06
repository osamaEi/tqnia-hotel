<?php

namespace App\Http\Controllers\Room;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

       use AuthorizesRequests; 

     public function index()
    {
      $rooms = Room::with('roomType')->get(); 
  
    return view('admin.room.index', compact('rooms')); 
    }

    public function create()
    {
        $this->authorize('create', Room::class);

        $roomTypes= RoomType::all();
      return view('admin.room.create',compact('roomTypes'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
     
    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate unique filename
        $image->storeAs('public/images/rooms', $imageName); // Save image to storage

        $validatedData['image'] = $imageName;
    }

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

        $this->authorize('update', $room);

        return view('admin.room.edit',compact('roomTypes','room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, string $id)
    {
        $room = Room::findOrFail($id);

        $this->authorize('update', $room);

        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::delete('public/images/rooms/' . $room->image);
            }
    
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); 
            $image->storeAs('public/images/rooms', $imageName); 
    
            $validatedData['image'] = $imageName;
        } else {
            $validatedData['image'] = $room->image;
        }
    
        $room->update($validatedData);
    
        return redirect()->route('room.index')->with('success', 'Room updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
    
        $this->authorize('delete', $room);
    
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
