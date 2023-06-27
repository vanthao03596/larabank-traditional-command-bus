<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class HandledBy
{
    public function __construct(
        public string $handlerClass
    ) {
    }
}