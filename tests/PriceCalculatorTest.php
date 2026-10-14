<?php
declare(strict_types=1);

use App\PriceCalculator;
use PHPUnit\Framework\TestCase;

final class PriceCalculatorTest extends TestCase
{
    public function testCalculatesTotal(): void
    {
        $calculator = new PriceCalculator();
        $actual = $calculator->total(2500, 2);

        self::assertSame(5000, $actual);
    }

    public function testAllowsZeroPrice(): void
    {
        $calculator = new PriceCalculator();

        self::assertSame(0, $calculator->total(0, 3));
    }

    public function testRejectsNegativePrice(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new PriceCalculator())->total(-100, 2);
    }

    public function testRejectsZeroQuantity(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new PriceCalculator())->total(100, 0);
    }
}
