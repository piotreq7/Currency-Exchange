<?php
declare(strict_types=1);
namespace App\Domain\Entity\Rounding;

interface RoundingInterface
{
    public function round(float $amount): float;
}