<?php

namespace App\Commands;

use App\Models\Account;

class UpdateAccountCommand
{
    public Account $account;

    public int $amount;

    public bool $isAdding;

    public function __construct($account, $amount, $isAdding)
    {
        $this->account = $account;
        $this->amount = $amount;
        $this->isAdding = $isAdding;
    }

    public function handle()
    {
        $this->isAdding
        ? $this->account->addMoney($this->amount)
        : $this->account->subtractMoney($this->amount);
    }

}