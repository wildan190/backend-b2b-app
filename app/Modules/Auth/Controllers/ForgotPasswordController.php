<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Action\ForgotPasswordAction;
use App\Modules\Auth\Jobs\ForgotPasswordJob;
use App\Modules\Auth\Request\ForgotPasswordRequest;
class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('pages.auth.forgot-password');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request, ForgotPasswordAction $action)
    {
        $action->execute($request->email);

        ForgotPasswordJob::dispatch($request->email);

        return back()->with('status', 'Link reset telah dikirim ke email Anda.');
    }
}
