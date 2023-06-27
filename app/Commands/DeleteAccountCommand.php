<?php

namespace App\Commands;

use App\Attributes\HandledBy;
use App\Handlers\DeleteAccountHandler;
use App\Models\Account;

#[HandledBy(DeleteAccountHandler::class)]
class DeleteAccountCommand
{
    public Account $account;

    public function __construct($account)
    {
        $this->account = $account;
    }
}