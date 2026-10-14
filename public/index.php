<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use App\PriceCalculator;

$calculator = new PriceCalculator();
$total = $calculator->total(2500, 2);

echo 'Total: ' . $total . ' kopecks' . PHP_EOL;
