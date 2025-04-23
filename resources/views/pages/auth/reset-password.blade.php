@extends('layouts.guest')

@section('content')
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <div class="auth-header">
                    <h2 class="text-white">Reset Your Password</h2>
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid mb-4"
                        style="max-width: 150px;">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-container">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="New password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Confirm new password" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100">Reset Password</button>
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
            padding: 80px 0;
            text-align: center;
            position: relative;
        }

        .auth-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 191, 0, 0.7);
            /* Yellow overlay */
            border-radius: 10px;
        }

        .auth-header h2 {
            font-size: 2.5rem;
            color: rgb(255, 191, 0);
            font-weight: bold;
            position: relative;
            z-index: 1;
        }

        .auth-header img {
            max-width: 150px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .auth-container {
            background-color: rgba(235, 234, 232, 0.9);
            /* Light background for form */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
            margin-top: 1px;
        }

        .auth-container .form-control {
            background-color: rgba(235, 234, 232, 0.9);
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

        .auth-container .mb-3 {
            margin-bottom: 20px;
        }

        .container {
            padding-top: 50px;
        }
    </style>
@endsection
