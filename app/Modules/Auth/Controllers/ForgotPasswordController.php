<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Action\ForgotPasswordAction;
use App\Modules\Auth\Jobs\ForgotPasswordJob;
use App\Modules\Auth\Request\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('pages.auth.forgot-password');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request, ForgotPasswordAction $action)
    {
        $responseMessage = $action->execute($request->email);

        if ($responseMessage === trans(Password::RESET_LINK_SENT)) {
            ForgotPasswordJob::dispatch($request->email);
            return back()->with('status', $responseMessage);
        }

        return back()->withErrors(['email' => $responseMessage]);
    }
}
