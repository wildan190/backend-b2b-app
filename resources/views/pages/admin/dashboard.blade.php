@extends('layouts.admin')

@section('content')
    @include('layouts.partials.breadcrumb', [
        'breadcrumbs' => [['title' => 'Dashboard', 'url' => route('dashboard')]],
    ])

    <h1>Dashboard</h1>
    <p>Welcome back, {{ auth()->user()->name }}!</p>
@endsection
