@extends('layouts.guest')

@section('content')
    <div class="auth-wrapper d-flex align-items-center justify-content-center">
        <div class="container">

            <div class="row justify-content-center mb-4">
                <div class="col-md-6 text-center">
                    <div class="auth-header">
                        <h2 class="text-white">Welcome to</h2>
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid mb-4"
                            style="max-width: 150px;">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="auth-container">

                        {{-- Error Message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}" class="text-warning">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('styles')
    <style>
        .auth-wrapper {
            min-height: 100vh;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-header {
            background: url('{{ asset('assets/img/authimg.png') }}') no-repeat center center;
            background-size: cover;
            padding: 80px 0;
            text-align: center;
            position: relative;
            border-radius: 10px;
        }

        .auth-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 191, 0, 0.7);
            border-radius: 10px;
        }

        .auth-header h2,
        .auth-header img {
            position: relative;
            z-index: 1;
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
    </style>
@endsection
