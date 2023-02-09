<?php
declare(strict_types=1);
namespace App\Tests\Application\Commands;

use App\Application\Commands\CurrencyBuyCommand;
use App\Application\Commands\CurrencySellCommand;
use App\Domain\Entity\Currency\EUR;
use App\Domain\Entity\Currency\GBP;
use App\Domain\Entity\Fee\OnePercentFee;
use App\Domain\Entity\Rounding\RoundDown;
use App\Domain\Repository\InMemoryExchangeRateRepository;
use PHPUnit\Framework\TestCase;

class CurrencyExchangeCommandTest extends TestCase
{
    public function testExchangeSellEURforGBP(): void
    {
        $gbp = new GBP();
        $eur = new EUR();
        $repo = new InMemoryExchangeRateRepository;
        $fee = new OnePercentFee();
        $roundingMethod = new RoundDown();
        $exchangedAmount = (new CurrencySellCommand())->execute(100, $eur, $gbp, $repo, $fee, $roundingMethod);
        $this->assertEquals(155.21, $exchangedAmount);
    }

    public function testExchangeSellGBPforEUR(): void
    {
        $gbp = new GBP();
        $eur = new EUR();
        $repo = new InMemoryExchangeRateRepository;
        $fee = new OnePercentFee();
        $roundingMethod = new RoundDown();
        $exchangedAmount = (new CurrencySellCommand())->execute(100, $gbp, $eur, $repo, $fee, $roundingMethod);
        $this->assertEquals(63.14, $exchangedAmount);
    }

    public function testExchangeBuyGBPforEUR(): void
    {
        $gbp = new GBP();
        $eur = new EUR();
        $repo = new InMemoryExchangeRateRepository;
        $fee = new OnePercentFee();
        $roundingMethod = new RoundDown();
        $exchangedAmount = (new CurrencyBuyCommand())->execute(100, $gbp, $eur, $repo, $fee, $roundingMethod);
        $this->assertEquals(158.36, $exchangedAmount);
    }

    public function testExchangeBuyEURforGBP(): void
    {
        $gbp = new GBP();
        $eur = new EUR();
        $repo = new InMemoryExchangeRateRepository;
        $fee = new OnePercentFee();
        $roundingMethod = new RoundDown();
        $exchangedAmount = (new CurrencyBuyCommand())->execute(100, $eur, $gbp, $repo, $fee, $roundingMethod);
        $this->assertEquals(64.42, $exchangedAmount);
    }
}
