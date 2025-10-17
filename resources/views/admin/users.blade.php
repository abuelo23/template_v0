@extends('layout.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        Create User
                    </button>
                </div>
                <div class="card-body">
                    <table id="users-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->hasRole('super-admin') ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm edit-user" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Form fields for creating a user -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label>Permissions</label>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                                    <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin_create">
                            <label class="form-check-label" for="is_admin_create">
                                Is Administrator
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_user_id" name="user_id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_password" class="form-label">Password (optional)</label>
                            <input type="password" class="form-control" id="edit_password" name="password">
                        </div>
                         <div class="mb-3">
                            <label>Permissions</label>
                            <div id="edit_permissions_list">
                                <!-- Permissions checkboxes will be loaded by JS -->
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="edit_is_admin">
                            <label class="form-check-label" for="edit_is_admin">
                                Is Administrator
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#users-table').DataTable();

    // Handle edit button click
    $('.edit-user').on('click', function() {
        var userId = $(this).data('id');
        var url = "/users/" + userId + "/edit";

        // Set the form action
        $('#editUserForm').attr('action', '/users/' + userId);

        $.get(url, function(data) {
            $('#edit_user_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_email').val(data.email);
            $('#edit_is_admin').prop('checked', data.is_admin);

            // Populate permissions
            var permissionsList = $('#edit_permissions_list');
            permissionsList.empty(); // Clear existing permissions
            @foreach ($permissions as $permission)
                var isChecked = data.user_permissions.includes("{{ $permission->name }}");
                var permissionHtml = '<div class="form-check">' +
                                     '<input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="edit_perm_{{ $permission->id }}" ' + (isChecked ? 'checked' : '') + '>' +
                                     '<label class="form-check-label" for="edit_perm_{{ $permission->id }}">{{ $permission->name }}</label>' +
                                     '</div>';
                permissionsList.append(permissionHtml);
            @endforeach
        });
    });
});
</script>
@endpush
