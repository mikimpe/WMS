<?php
declare(strict_types=1);

namespace Mikimpe\WMS\Test\Integration;

use Magento\TestFramework\Helper\Bootstrap;
use Mikimpe\WMS\Exception\FakeException;
use Mikimpe\WMS\Model\GetProductQty;
use Mikimpe\WMS\Model\RandomError;
use PHPUnit\Framework\TestCase;

class GetProductQtyTest extends TestCase
{
    /**
     * @return void
     * @throws FakeException
     */
    public function testShouldCorrectlyGetProductQty(): void
    {
        $subject = Bootstrap::getObjectManager()->create(
            GetProductQty::class,
            [
                'randomError' => $this->buildRandomErrorMock(false)
            ]
        );

        $qty = $subject->execute('test');

        self::assertIsInt($qty);
    }

    /**
     * @return void
     * @throws FakeException
     */
    public function testShouldThrowExceptionIfForced(): void
    {
        $subject = Bootstrap::getObjectManager()->create(
            GetProductQty::class,
            [
                'randomError' => $this->buildRandomErrorMock(true)
            ]
        );

        $this->expectException(FakeException::class);
        $subject->execute('test');
    }

    /**
     * @param bool $shouldReturnError
     * @return RandomError
     */
    private function buildRandomErrorMock(bool $shouldReturnError): RandomError
    {
        $randomErrorMock = $this->getMockBuilder(RandomError::class)
            ->disableOriginalConstructor()
            ->getMock();
        $randomErrorMock->method('execute')->willReturn($shouldReturnError);

        return $randomErrorMock;
    }
}
