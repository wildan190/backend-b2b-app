@extends('layouts.guest')

@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 bg-light text-center">
    <div>
        <h1 class="display-1 fw-bold text-warning">503</h1>
        <p class="fs-3"> <span class="text-danger">Maaf!</span> Layanan sedang tidak tersedia.</p>
        <p class="lead">
            Kami sedang melakukan perawatan sistem. Silakan coba beberapa saat lagi.
        </p>
        <a href="{{ url()->current() }}" class="btn btn-warning">Muat Ulang</a>
    </div>
</div>
@endsection
