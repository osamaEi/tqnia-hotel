<?php

namespace App\Http\Controllers\Room;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypeRequest;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('admin.roomtype.index',compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomTypeRequest $request)
    {
        RoomType::create($request->validated());

        return redirect()->route('roomtype.index')->with('success', 'Room type created successfully!');
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
        //
        $roomType = RoomType::findOrFail($id);
        return view('admin.roomtype.edit',compact('roomType'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomTypeRequest $request, string $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->validated());
        return redirect()->route('roomtype.index')->with('success', 'Room type created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();
        return redirect()->route('roomtype.index')->with('success', 'Room type deleted successfully!');
    }
}
