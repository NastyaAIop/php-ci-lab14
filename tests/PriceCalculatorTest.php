<?php
declare(strict_types=1);

use App\PriceCalculator;
use PHPUnit\Framework\TestCase;

final class PriceCalculatorTest extends TestCase
{
    public function testCalculatesTotal(): void
    {
        $calculator = new PriceCalculator();
        self::assertSame(5000, $calculator->total(2500, 2));
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

    public function testShippingBelowThreshold(): void
    {
        $calculator = new PriceCalculator();
        self::assertSame(6000, $calculator->shipping(59999));
    }

    public function testShippingAtThreshold(): void
    {
        $calculator = new PriceCalculator();
        self::assertSame(0, $calculator->shipping(60000));
    }

    public function testShippingAboveThreshold(): void
    {
        $calculator = new PriceCalculator();
        self::assertSame(0, $calculator->shipping(60001));
    }

    public function testShippingRejectsNegativeSubtotal(): void
    {
        $this->expectException(InvalidArgumentException::class);
        (new PriceCalculator())->shipping(-1);
    }
}
