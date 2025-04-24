@extends('layouts.guest')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light text-center">
    <div>
        <h1 class="display-1 fw-bold text-warning">419</h1>
        <p class="fs-3"> <span class="text-danger">Oops!</span> Halaman kadaluarsa.</p>
        <p class="lead">
            Waktu sesi Anda telah habis. Silakan muat ulang halaman atau login kembali.
        </p>
        <a href="{{ url()->previous() }}" class="btn btn-warning me-2">Kembali</a>
        <a href="{{ route('login') }}" class="btn btn-outline-warning">Login Ulang</a>
    </div>
</div>
@endsection
