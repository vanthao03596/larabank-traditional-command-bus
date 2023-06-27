<?php

namespace App\Handlers;

use App\Commands\DeleteAccountCommand;

class DeleteAccountHandler
{
    public function handle(DeleteAccountCommand $command)
    {
        $command->account->delete();
    }
}