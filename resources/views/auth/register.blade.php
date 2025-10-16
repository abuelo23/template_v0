@extends('layout.app')

@section('content')
    <div class="auth-main v1">
        <div class="auth-wrapper">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/header/diapo.svg') }}" alt="images" class="img-fluid mb-3" width="auto"
                                height="60">
                            <h4 class="f-w-500 mb-1">Register</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required
                                    autocomplete="name" autofocus placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" required
                                    autocomplete="new-password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password_confirmation" required
                                    autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                             <div class="mb-3">
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
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin">
                                    <label class="form-check-label" for="is_admin">
                                        Is Administrator
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Already have an account?</h6>
                            <a href="{{ route('login') }}" class="link-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
