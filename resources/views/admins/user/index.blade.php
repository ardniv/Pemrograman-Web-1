@extends('layout.app')

@section('title','User')

@section('content')
<div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
                        <a href="{{ route('admins.user.create') }}" class="btn btn-primary">Add</a>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->usertype }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start">
                                                        <a href="{{ route('admins.user.edit', $user->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})">Delete</button>
                                                            <form id="delete-form-{{ $user->id }}" action="{{ route('admins.user.destroy', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

@endsection