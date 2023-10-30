<?php
declare(strict_types=1);

namespace Mikimpe\WMS\Model;

use Exception;
use Mikimpe\WMS\Api\GetProductQtyInterface;
use Mikimpe\WMS\Exception\FakeException;
use Psr\Log\LoggerInterface;

class GetProductQty implements GetProductQtyInterface
{
    private RandomError $randomError;
    private LoggerInterface $logger;

    /**
     * @param RandomError $randomError
     * @param LoggerInterface $logger
     */
    public function __construct(
        RandomError $randomError,
        LoggerInterface $logger
    ) {
        $this->randomError = $randomError;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     * @throws FakeException
     */
    public function execute(string $sku): int
    {
        if ($this->randomError->execute()) {
            $msg = __('Fake error from internal WMS');
            $this->logger->error($msg);
            throw new FakeException($msg);
        }

        try {
            return $this->generateProductQty();
        } catch (Exception) {
            $msg = __('Fake error from internal WMS');
            $this->logger->error($msg);
            throw new FakeException($msg);
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
