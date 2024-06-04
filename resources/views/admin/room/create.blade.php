@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Room  </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Room </li>
                </ol>
            </nav>
        </div>

    </div>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="room_name" class="form-label">Room Name:</label>
                        <input type="text" name="room_name" id="room_name" class="form-control" value="{{ old('room_name') }}" required>
                        @error('room_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="room_type_id" class="form-label">Room Type:</label>
                        <select name="room_type_id" id="room_type_id" class="form-control" required>
                            <option value="">Select Room Type</option>
                            @foreach ($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}" {{ old('room_type_id') == $roomType->id ? 'selected' : '' }}>{{ $roomType->name }}</option>
                            @endforeach
                        </select>
                        @error('room_type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image :</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description (Optional):</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="room_number" class="form-label">Room Number:</label>
                        <input type="number" name="room_number" id="room_number" class="form-control" value="{{ old('room_number') }}" required>
                        @error('room_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="available">Available</option>
                            <option value="booked">Booked</option>
                            <option value="pending">Pending</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">

                    <button type="submit" class="btn btn-primary">Create Room</button>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
