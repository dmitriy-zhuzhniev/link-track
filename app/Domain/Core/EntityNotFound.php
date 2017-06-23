<?php

namespace App\Domain\Core;

abstract class EntityNotFound extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->code = 404;
    }
}