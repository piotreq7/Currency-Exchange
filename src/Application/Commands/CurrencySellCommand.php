<?php
namespace App\Application\Commands;

use App\Domain\Entity\Currency\Currency;
use App\Domain\Entity\Fee\FeeInterface;
use App\Domain\Entity\Rounding\RoundingInterface;
use App\Domain\Repository\ExchangeRateRepository;

class CurrencySellCommand implements CurrencyExchangeCommandInterface
{
    public function execute(float $amount,
                            Currency $from,
                            Currency $to,
                            ExchangeRateRepository $exchangeRateRepository,
                            FeeInterface $fee,
                            RoundingInterface $rounding): float
    {
        $exchangeRate = $exchangeRateRepository->getExchangeRate($from, $to);
        return $rounding->round(($amount * $exchangeRate) * (1 - $fee->getFee()));
    }
}