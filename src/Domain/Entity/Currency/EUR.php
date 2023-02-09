<?php
declare(strict_types=1);
namespace App\Domain\Entity\Currency;

class EUR implements Currency
{
    public function getCode(): string
    {
        return 'EUR';
    }
}