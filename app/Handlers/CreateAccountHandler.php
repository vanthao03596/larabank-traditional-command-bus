<?php

namespace App\Handlers;

use App\Commands\CreateAccountCommand;
use App\Models\Account;

class CreateAccountHandler
{
    public function handle(CreateAccountCommand $command)
    {
        Account::create([
            'name' => $command->name,
            'user_id' => $command->id,
        ]);
    }
}