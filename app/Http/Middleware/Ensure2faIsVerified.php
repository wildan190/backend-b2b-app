<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ensure2faIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Jika tidak ada user, langsung next
        if (!$user) {
            return $next($request);
        }

        // Jika user punya 2FA dan belum verifikasi di session
        if ($user->google2fa_secret && !$request->session()->get('2fa_verified')) {
            return redirect()->route('2fa.verify.form');
        }

        return $next($request);
    }
}
