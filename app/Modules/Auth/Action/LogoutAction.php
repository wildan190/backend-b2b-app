<?php

namespace App\Modules\Auth\Action;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LogoutAction
{
    public function execute(): void
    {
        Auth::logout();

        Session::invalidate();
        Session::flush();
        Session::regenerateToken();

        Cookie::queue(Cookie::forget('remember_token'));

        Cookie::queue(Cookie::forget('XSRF-TOKEN'));
    }
}
