@extends('layouts.admin')

@section('content')

<div class="container">
    <h2 class="mt-4">Aktifkan Two-Factor Authentication</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cara Mengaktifkan 2FA</h5>
            <p>Untuk meningkatkan keamanan akun Anda, kami menyarankan Anda untuk mengaktifkan Two-Factor Authentication (2FA).</p>
            <p><strong>Langkah 1:</strong> Scan QR Code menggunakan aplikasi autentikator seperti Google Authenticator atau Authy.</p>
            <p><strong>Langkah 2:</strong> Masukkan kode OTP yang dihasilkan oleh aplikasi autentikator.</p>

            <div class="text-center">
                {!! $QR_Image !!}
                <p><strong>Kode Rahasia:</strong> {{ $secret }}</p>
            </div>

            <form method="POST" action="{{ route('2fa.verify') }}">
                @csrf
                <div class="mb-3">
                    <label for="otp" class="form-label">Masukkan Kode OTP</label>
                    <input type="text" name="otp" id="otp" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Verifikasi</button>
            </form>
        </div>
    </div>
</div>

@endsection
