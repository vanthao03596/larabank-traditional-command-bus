<?php

namespace App\Commands;

class CreateAccountCommand
{
    public string $name;

    public int $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }
}