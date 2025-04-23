<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Action\LoginAction;
use App\Modules\Auth\Action\RegisterAction;
use App\Modules\Auth\Action\LogoutAction;
use App\Modules\Auth\Request\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    /**
     * Proses login.
     *
     * @param \App\Modules\Auth\Request\AuthRequest $request
     * @param \App\Modules\Auth\Action\LoginAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeLogin(AuthRequest $request, LoginAction $action)
    {
        $remember = $request->has('remember');

        if ($action->execute($request->email, $request->password, $remember)) {
            $request->session()->regenerate();

            // Cek apakah 2FA diaktifkan untuk pengguna
            $user = Auth::user();
            if ($user->google2fa_secret && !session('2fa_verified')) {
                return redirect()->route('2fa.verify');
            }

            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    /**
     * Halaman register.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('pages.auth.register');
    }

    /**
     * Proses register.
     *
     * @param \App\Modules\Auth\Request\AuthRequest $request
     * @param \App\Modules\Auth\Action\RegisterAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRegister(AuthRequest $request, RegisterAction $action)
    {
        $action->execute($request->validated());
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    /**
     * Proses logout.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Modules\Auth\Action\LogoutAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request, LogoutAction $action)
    {
        $action->execute();
        return redirect()->route('login');
    }
}
