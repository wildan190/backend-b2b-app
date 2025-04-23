<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Auth\Controllers\ForgotPasswordController;
use App\Modules\Auth\Controllers\ResetPasswordController;
use App\Modules\Auth\Controllers\TwoFactorAuthenticationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'storeLogin'])->name('storeLogin');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'storeRegister'])->name('storeRegister');
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('pages.auth.verify-email');
    })->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    })->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return back()->with('success', 'Email sudah diverifikasi.');
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Email verifikasi telah dikirim. Silakan periksa kotak masuk Anda.');
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware('auth')->group(function () {
    Route::get('2fa/setup', [TwoFactorAuthenticationController::class, 'show2faForm'])->name('2fa.setup');
    Route::get('2fa/verify', [TwoFactorAuthenticationController::class, 'showVerificationForm'])->name('2fa.verify.form');
    Route::post('2fa/verify', [TwoFactorAuthenticationController::class, 'verify2fa'])->name('2fa.verify');
    Route::post('2fa/disable', [TwoFactorAuthenticationController::class, 'disable2fa'])->name('2fa.disable');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

