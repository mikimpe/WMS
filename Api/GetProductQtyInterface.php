<?php
declare(strict_types=1);

namespace Mikimpe\WMS\Api;

use Mikimpe\WMS\Exception\FakeException;

interface GetProductQtyInterface
{
    /**
     * @param string $sku
     * @return int
     * @throws FakeException
     */
    public function execute(string $sku): int;
}
