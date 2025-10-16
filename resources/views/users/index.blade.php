@extends('layout.index')

@section('content')
<div class="container">
    <h2>User Management</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
        Create User
    </button>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- User data will be populated here from the controller --}}
        </tbody>
    </table>
</div>

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Permissions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="banco_venezuela.conciliacion" id="perm_conciliacion_vzla">
                            <label class="form-check-label" for="perm_conciliacion_vzla">
                                Banco Venezuela - Conciliacion
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="banco_bancamiga.reporte" id="perm_reporte_bancamiga">
                            <label class="form-check-label" for="perm_reporte_bancamiga">
                                Banco Bancamiga - Reporte
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="banco_tesoro.reporte" id="perm_reporte_tesoro">
                            <label class="form-check-label" for="perm_reporte_tesoro">
                                Banco Tesoro - Reporte
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="banco_venezuela.reporte" id="perm_reporte_vzla">
                            <label class="form-check-label" for="perm_reporte_vzla">
                                Banco Venezuela - Reporte
                            </label>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin">
                            <label class="form-check-label" for="is_admin">
                                Is Administrator
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveUser">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection