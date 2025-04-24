@extends('layouts.guest')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light text-center">
    <div>
        <h1 class="display-1 fw-bold text-warning">404</h1>
        <p class="fs-3"> <span class="text-danger">Oops!</span> Halaman tidak ditemukan.</p>
        <p class="lead">
            Halaman yang kamu cari tidak tersedia.
        </p>
        <a href="{{ url('/') }}" class="btn btn-warning">Kembali ke Beranda</a>
    </div>
</div>
@endsection
