<?php

namespace App\Modules\Auth\Action;

class ForgotPasswordAction
{
    public function execute(string $email): string
    {
        return 'LINK_SENT';
    }
}
