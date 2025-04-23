@extends('layouts.admin')

@section('content')

@include('layouts.partials.breadcrumb', [
    'breadcrumbs' => [
        ['title' => 'Dashboard', 'url' => route('dashboard')],
        ['title' => 'Profile', 'url' => route('profile.index')],
        ['title' => 'Edit', 'url' => '#'],
    ]
])

<div class="container">
    <h2 class="mt-4">Edit Profile</h2>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <label for="password">New Password (Leave blank if you don't want to change it)</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-success mt-3">Save Changes</button>
            </div>
        </div>
    </form>
</div>
@endsection
