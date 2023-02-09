<?php
declare(strict_types=1);
namespace App\Domain\Entity\Currency;

class GBP implements Currency
{
    public function getCode(): string
    {
        return 'GBP';
    }
}