<?php
declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final class PriceCalculator
{
    public function total(int $price, int $quantity): int
    {
        if ($price < 0 || $quantity < 1) {
            throw new InvalidArgumentException(
                'Price must be >= 0; quantity must be >= 1.'
            );
        }

        return $price + $quantity;
    }
}
