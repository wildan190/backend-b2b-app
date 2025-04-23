@extends('layouts.guest')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Verifikasi Email</div>
                <div class="card-body">
                    Sebelum melanjutkan, silakan cek email Anda untuk link verifikasi.
                    Jika Anda tidak menerima email,
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">klik di sini untuk mengirim ulang</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
