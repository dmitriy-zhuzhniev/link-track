<?php

namespace App\Domain\Core;

class Pagination
{
    /**
     * @var int
     */
    private $page = 1;

    /**
     * @var int
     */
    private $perPage = 10;

    /**
     * Pagination constructor.
     *
     * @param int $page
     * @param int $perPage
     */
    public function __construct($page = 1, $perPage = 10)
    {
        $this->page = $page ?: $this->page;
        $this->perPage = $perPage ?: $this->perPage;
    }

    /**
     * @return int
     */
    public function offset()
    {
        return $this->perPage * ($this->page - 1);
    }

    /**
     * @return int
     */
    public function limit()
    {
        return $this->perPage;
    }
}