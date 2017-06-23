<?php

namespace App\Domain\Click;

class ClickId
{
    /**
     * @var int
     */
    private $value;

    /**
     * ClickId constructor.
     *
     * @param int $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * @param ClickId $that
     *
     * @return bool
     */
    public function equals(ClickId $that)
    {
        return $this->value === $that->value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}