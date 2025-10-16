@extends('layout.index')

@section('content')
    <div class="auth-main v1">
        <div class="auth-wrapper">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/header/diapo.svg') }}" alt="images" class="img-fluid mb-3" width="auto"
                                height="60">
                            <h4 class="f-w-500 mb-1">Login</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                            </div>
                            <div class="mb-3">
                                 <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Don't have an account?</h6>
                            <a href="{{ route('register') }}" class="link-primary">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
