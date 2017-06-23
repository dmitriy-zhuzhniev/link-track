<?php

namespace App\Domain\Click;

use App\Domain\Core\Pagination;

interface ClickRepository
{
    /**
     * @return ClickId
     */
    public function nextId();

    /**
     * @param ClickFilter $filter
     * @param Pagination|null $pagination
     *
     * @return Click[]
     */
    public function all(ClickFilter $filter, $pagination = null);

    /**
     * @param ClickId $voucherId
     *
     * @return Click|null
     */
    public function byId(ClickId $voucherId);

    /**
     * @param Click $voucher
     */
    public function store(Click $voucher);

    /**
     * @param $vouchers
     *
     * @return void
     */
    public function deleteList($vouchers);
}