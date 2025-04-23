<?php

namespace App\Modules\Profile\Action;

use App\Models\User;

class GetProfileAction
{
    public function execute(int $userId): User
    {
        return User::findOrFail($userId);
    }
}
