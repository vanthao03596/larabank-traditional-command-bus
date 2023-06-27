<?php

namespace App;

use App\Attributes\HandledBy;
use Illuminate\Bus\Dispatcher;
use ReflectionClass;

class CustomDispatcher extends Dispatcher
{
    public function getCommandHandler($command)
    {
        $attribute = (new ReflectionClass($command))->getAttributes(HandledBy::class)[0] ?? null;

        if ($attribute) {
            $handlerClass = ($attribute->newInstance())->handlerClass;
            return $this->container->make($handlerClass);
        }

        if ($this->hasCommandHandler($command)) {
            return $this->container->make($this->handlers[get_class($command)]);
        }

        return false;
    }
}