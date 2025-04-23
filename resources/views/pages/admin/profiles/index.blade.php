@extends('layouts.admin')

@section('content')

@include('layouts.partials.breadcrumb', [
    'breadcrumbs' => [
        ['title' => 'Dashboard', 'url' => route('dashboard')],
        ['title' => 'Profile', 'url' => route('profile.index')],
    ]
])

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            confirmButtonColor: 'rgb(255, 191, 0)'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonColor: 'rgb(255, 96, 0)'
        });
    </script>
@endif

<div class="container">
    <h2 class="mt-4">Profil Saya</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Halo, {{ $user->name }}</h5>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            {{-- Email Verification --}}
            @if (!$user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3">
                    <p>Email Anda <strong>belum diverifikasi.</strong></p>
                    <p>Silakan cek kotak masuk atau folder spam untuk link verifikasi.</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-warning">
                            Kirim Ulang Email Verifikasi
                        </button>
                    </form>
                </div>
            @else
                <div class="alert alert-success mt-3">
                    <i class="bi bi-check-circle-fill"></i> Email Anda telah <strong>terverifikasi.</strong>
                </div>
            @endif

            {{-- Two-Factor Authentication --}}
            <div class="mt-4">
                <h6>Two-Factor Authentication (2FA)</h6>
                {{-- Check if the user has google2fa_secret --}}
                @if ($user->google2fa_secret)
                    <div class="alert alert-success">
                        2FA telah <strong>diaktifkan</strong> untuk akun ini.
                    </div>
                    <form action="{{ route('2fa.disable') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Nonaktifkan 2FA</button>
                    </form>
                @else
                    <div class="alert alert-secondary">
                        2FA belum diaktifkan. Aktifkan sekarang untuk menambah keamanan akun Anda.
                    </div>
                    <a href="{{ route('2fa.setup') }}" class="btn btn-warning btn-sm">Aktifkan 2FA</a>
                @endif
            </div>

            <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">
                <i class="bi bi-pencil-fill"></i> Edit Profil
            </a>
        </div>
    </div>
</div>

@endsection
