<?php

namespace App\Modules\Auth\Action;

use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function execute(string $email, string $password, bool $remember = false): bool
    {
        $success = Auth::attempt(['email' => $email, 'password' => $password], $remember);

        if ($success) {
            session(['2fa_verified' => false]);
        }

        return $success;
    }
}
