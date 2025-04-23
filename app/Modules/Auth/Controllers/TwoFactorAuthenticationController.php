<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TwoFactorAuthenticationController extends Controller
{
    public function show2faForm()
    {
        $user = Auth::user();
        if (!$user instanceof \App\Models\User) {
            throw new \Exception('Authenticated user is not an instance of the User model.');
        }
        if (!$user instanceof \App\Models\User) {
            throw new \Exception('Authenticated user is not an instance of the User model.');
        }
        $google2fa = new Google2FA();
        $user->save();
        if (!$user->google2fa_secret) {
            $user->google2fa_secret = $google2fa->generateSecretKey();
            $user->save();
        }

        $QR_Image = QrCode::size(200)->generate(
            $google2fa->getQRCodeUrl(
                config('app.name'),
                $user->email,
                $user->google2fa_secret
            )
        );

        return view('pages.auth.2fa-setup', [
            'QR_Image' => $QR_Image,
            'secret' => $user->google2fa_secret
        ]);
    }

    public function showVerificationForm()
    {
        $user = Auth::user();

        if (!$user->google2fa_secret) {
            return redirect()->route('2fa.setup')->with('error', 'Anda belum mengaktifkan 2FA.');
        }

        return view('pages.auth.2fa-verify');
    }


    public function verify2fa(Request $request)
    {
        $google2fa = new Google2FA();
        $user = Auth::user();

        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->input('otp'));

        if ($valid) {
            session(['2fa_verified' => true]);
            return redirect()->route('dashboard')->with('success', '2FA berhasil diverifikasi!');
        }

        return back()->withErrors(['otp' => 'Kode OTP tidak valid.']);
    }

    public function disable2fa()
    {
        $user = Auth::user();
        if (!$user instanceof \App\Models\User) {
            throw new \Exception('Authenticated user is not an instance of the User model.');
        }

        $user->google2fa_secret = null;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Two-Factor Authentication berhasil dinonaktifkan.');
    }
}
