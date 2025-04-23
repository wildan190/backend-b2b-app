@extends('layouts.guest')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="auth-header rounded text-center mb-4">
                <div class="position-relative z-2">
                    <h2 class="text-white fw-bold mb-3">Welcome to</h2>
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
                </div>
            </div>

            <div class="auth-container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .auth-header {
        background: url('{{ asset('assets/img/authimg.png') }}') no-repeat center center;
        background-size: cover;
        padding: 60px 20px;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .auth-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 191, 0, 0.7);
        z-index: 1;
        border-radius: 10px;
    }

    .auth-header .z-2 {
        position: relative;
        z-index: 2;
    }

    .auth-container {
        background-color: rgba(235, 234, 232, 0.95);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .auth-container .form-control {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgb(255, 96, 0);
        color: black;
    }

    .auth-container .form-control:focus {
        border-color: rgb(255, 191, 0);
        box-shadow: 0 0 5px rgb(255, 191, 0);
    }

    .btn-warning {
        background-color: rgb(255, 191, 0);
        border-color: rgb(255, 96, 0);
    }

    .btn-warning:hover {
        background-color: rgb(255, 96, 0);
        border-color: rgb(255, 191, 0);
    }

    @media (max-width: 768px) {
        .auth-header {
            padding: 40px 10px;
        }

        .auth-container {
            padding: 20px;
        }
    }
</style>
@endsection
