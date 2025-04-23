<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Request\ResetPasswordRequest;
use App\Modules\Auth\Jobs\ResetPasswordJob;
use App\Modules\Auth\Action\ResetPasswordAction;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('pages.auth.reset-password', ['token' => $token]);
    }

    public function reset(ResetPasswordRequest $request, ResetPasswordAction $action)
    {
        $data = $request->only('email', 'password', 'password_confirmation', 'token');

        $action->execute($data);
        ResetPasswordJob::dispatch($data);

        return redirect()->route('login')->with('status', 'Reset password sedang diproses. Cek email Anda sebentar lagi.');
    }
}
