@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">

                <a href="{{ route('roomtype.create') }}" class="btn btn-outline-primary px-5 radius-30"> Add Room Type </a>                
            </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Room Type List  </h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($roomTypes as $key=> $roomtype ) 

                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ $roomtype->name }}</td>
                    
                            <td>

    <a href="{{ route ('roomtype.edit',$roomtype->id)}}" class="btn btn-warning px-3 radius-30"> Edit</a>

   <form method="POST" action="{{ route('roomtype.destroy', $roomtype->id) }}" id="deleteForm">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger px-3 radius-30" id="delete">Delete</button>
</form>

                                </td>
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
    document.getElementById('delete').addEventListener('click', function(event) {
        if (!confirm('Are you sure you want to delete this room type?')) {
            event.preventDefault(); // Prevent form submission if user cancels deletion
        }
    });
</script>



@endsection