<?php

namespace App\Modules\Auth\Services;

use Illuminate\Support\Facades\Auth;

class AuthServices
{
    public function user()
    {
        return Auth::user();
    }

    public function check(): bool
    {
        return Auth::check();
    }
}
