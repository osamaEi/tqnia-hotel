@extends('backend.admin_dashboard')

@section('admin')

<div class="page-content">
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <a href="{{ route('room.create') }}" class="btn btn-outline-primary px-5 radius-30">Add Room Type</a>
        </ol>
      </nav>
    </div>
  </div>
  <h6 class="mb-0 text-uppercase">Room Type List</h6>
  <hr/>
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Room Name</th>
              <th>Room Type</th>
              <th>Image</th>
              <th>Description</th>
              <th>Room Number</th>
              <th class="text-center">Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rooms as $room)
            <tr>
              <td>{{ $room->room_name }}</td>
              <td>{{ $room->roomType->name ?? 'Not Assigned' }}</td>
              <td>
                @if ($room->image)
                  <img src="{{ asset('storage/images/rooms/' . $room->image) }}" alt="{{ $room->room_name }}" width="100">
                @else
                  No Image
                @endif
              </td>
              <td>{{ Str::limit($room->description, 50) }}</td>
              <td>{{ $room->room_number }}</td>
              <td class="text-center">
              
                <span class="badge bg-{{ $room->status === 'available' ? 'success' : ($room->status === 'pending' ? 'warning' : 'danger') }}">
                  {{ $room->status }}
                </span>
              </td>
              <td>

                @if (auth('admin')->check() && auth('admin')->user()->can('update', $room))

                <a class="btn btn-success" href="{{ route('room.edit', $room->id) }}">Edit</a>

                @endif

          
                @if (auth('admin')->check() && auth('admin')->user()->can('delete', $room))

                <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display: inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                </form>
@endif
                <form action="{{ route('room.update-status', $room->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    <select name="status" class="form-select form-select-sm room-status-select" data-room-id="{{ $room->id }}">
                      <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                      <option value="pending" {{ $room->status == 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked</option>
                    </select>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <hr/>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const statusSelects = document.querySelectorAll('.room-status-select');
    statusSelects.forEach(select => {
      select.addEventListener('change', function(event) {
        const roomId = event.target.dataset.roomId;
        const form = event.target.parentElement;
        form.submit(); // Submit the form with the new status selection
      });
    });
  });

  document.getElementById('delete').addEventListener('click', function(event) {
    if (!confirm('Are you sure you want to delete this room type?')) {
      event.preventDefault(); // Prevent form submission if user cancels deletion
    }
  });
</script>

@endsection
