@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4>Verifikasi Two-Factor Authentication</h4>
            <p>Masukkan kode OTP yang telah Anda terima melalui aplikasi Google Authenticator.</p>
            <form action="{{ route('2fa.verify') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="otp" class="form-label">Kode OTP</label>
                    <input type="text" name="otp" id="otp" class="form-control" required autofocus>
                </div>
                <button type="submit" class="btn btn-warning w-100">Verifikasi</button>
            </form>
        </div>
    </div>
</div>
@endsection
