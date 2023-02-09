<?php
declare(strict_types=1);
namespace App\Domain\Repository;

use App\Domain\Entity\Currency\Currency;

class InMemoryExchangeRateRepository implements ExchangeRateRepository
{
    //I only used the first pair. I discussed it with Gregory
    private $rates = [
        ['EUR', 'GBP', 1.5678]
    ];

    public function getExchangeRate(Currency $from, Currency $to): float
    {
        foreach ($this->rates as $rate) {
            if ($rate[0] === $from->getCode() && $rate[1] === $to->getCode()) {
                return $rate[2];
            }
        }
        if($reverseExchange = (1/$this->getExchangeRate($to, $from))){
            return $reverseExchange;
        }
        throw new \InvalidArgumentException("No exchange rate found for {$from->getCode()} to {$to->getCode()}");
    }
}