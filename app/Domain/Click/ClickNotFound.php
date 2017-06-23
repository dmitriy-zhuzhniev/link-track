<?php

namespace App\Domain\Click;

use App\Domain\Core\EntityNotFound;

final class ClickNotFound extends EntityNotFound
{
    /**
     * @param $id
     *
     * @return ClickNotFound
     */
    public static function fromId($id)
    {
        return new ClickNotFound("Click with id #{$id} not found.");
    }
}