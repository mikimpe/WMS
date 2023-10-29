<?php
declare(strict_types=1);

namespace Mikimpe\WMS\Model;

use Exception;
use Mikimpe\WMS\Api\GetProductQtyInterface;
use Mikimpe\WMS\Exception\FakeException;

class GetProductQty implements GetProductQtyInterface
{
    /**
     * @inheritDoc
     * @throws FakeException
     */
    public function execute(string $sku): int
    {
        try {
            $diceRes = $this->throwDice();
            if ($diceRes < 3) {
                throw new FakeException(__('Fake Error'));
            }

            return $this->generateProductQty();
        } catch (Exception) {
            throw new FakeException(__('Fake Error'));
        }
    }

    /**
     * @return int
     * @throws Exception
     */
    private function throwDice(): int
    {
        return random_int(1, 6);
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
