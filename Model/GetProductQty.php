<?php
declare(strict_types=1);

namespace Mikimpe\WMS\Model;

use Exception;
use Mikimpe\WMS\Api\GetProductQtyInterface;
use Mikimpe\WMS\Exception\FakeException;

class GetProductQty implements GetProductQtyInterface
{
    private RandomError $randomError;

    /**
     * @param RandomError $randomError
     */
    public function __construct(
        RandomError $randomError
    ) {
        $this->randomError = $randomError;
    }

    /**
     * @inheritDoc
     * @throws FakeException
     */
    public function execute(string $sku): int
    {
        if ($this->randomError->execute()) {
            throw new FakeException(__('Fake error from internal WMS'));
        }

        try {
            return $this->generateProductQty();
        } catch (Exception) {
            throw new FakeException(__('Fake error from internal WMS'));
        }
    }

    /**
     * @return int
     * @throws Exception
     */
    private function generateProductQty(): int
    {
        return random_int(0, 100);
    }
}
