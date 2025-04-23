<?php

namespace App\Modules\Auth\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Password;

class ForgotPasswordJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        Password::sendResetLink(['email' => $this->email]);
    }
}
