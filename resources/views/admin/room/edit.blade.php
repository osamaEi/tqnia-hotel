@extends('admin.admin_dashboard')

@section('admin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <h5 class="card-header">Edit Room</h5>

                <form method="POST" action="{{ route('room.update', $room->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="form-group mb-3">
                        <label for="room_name" class="form-label">Room Name:</label>
                        <input type="text" name="room_name" id="room_name" class="form-control" value="{{ old('room_name', $room->room_name) }}" required>
                        @error('room_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="room_type_id" class="form-label">Room Type:</label>
                        <select name="room_type_id" id="room_type_id" class="form-control" required>
                            <option value="">Select Room Type</option>
                            @foreach ($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}" {{ $room->room_type_id == $roomType->id ? 'selected' : '' }}>{{ $roomType->name }}</option>
                            @endforeach
                        </select>
                        @error('room_type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image (Optional):</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        @if ($room->image)
                            <p>Current Image: <img src="{{ asset('storage/images/rooms/' . $room->image) }}" alt="{{ $room->room_name }} image" width="100"></p>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description (Optional):</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $room->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="room_number" class="form-label">Room Number:</label>
                        <input type="number" name="room_number" id="room_number" class="form-control" value="{{ old('room_number', $room->room_number) }}" required>
                        @error('room_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="available" {{ $room->status === 'available' ? 'selected' : '' }}>Available</option>
                            <option value="booked" {{ $room->status === 'booked' ? 'selected' : '' }}>Booked</option>
                            <option value="pending" {{ $room->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Room</button>
                </form>
            </div>
        </div>
    </div>
</div>

