<?php
declare(strict_types=1);
namespace App\Application\Commands;

use App\Domain\Entity\Currency\Currency;
use App\Domain\Entity\Fee\FeeInterface;
use App\Domain\Entity\Rounding\RoundingInterface;
use App\Domain\Repository\ExchangeRateRepository;

interface CurrencyExchangeCommandInterface
{
    public function execute(float $amount,
                            Currency $from,
                            Currency $to,
                            ExchangeRateRepository $exchangeRateRepository,
                            FeeInterface $fee,
                            RoundingInterface $rounding): float;
}