<?php
declare(strict_types=1);
namespace App\Domain\Entity\Rounding;

class RoundDown implements RoundingInterface
{
    public function round(float $amount): float
    {
        return floor($amount * 100) / 100;
    }
}