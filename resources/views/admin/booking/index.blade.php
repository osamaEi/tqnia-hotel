@extends('admin.admin_dashboard')

@section('admin')
    <div class="container mt-4">
        <h2>Booking Requests</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Room</th>
                    <th>Room Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->room->room_name }}</td>
                        <td>{{ $booking->room->roomType->name }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
                                @csrf
                                <select name="status" class="form-select">
                                    <option value="Pending" @if($booking->status === 'Pending') selected @endif>Pending</option>
                                    <option value="Approved" @if($booking->status === 'Approved') selected @endif>Approved</option>
                                    <option value="Rejected" @if($booking->status === 'Rejected') selected @endif>Rejected</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
