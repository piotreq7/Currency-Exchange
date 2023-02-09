<?php
declare(strict_types=1);
namespace App\Domain\Repository;

use App\Domain\Entity\Currency\Currency;

interface ExchangeRateRepository
{
    public function getExchangeRate(Currency $from, Currency $to): float;
}