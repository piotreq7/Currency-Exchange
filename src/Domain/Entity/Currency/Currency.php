<?php

namespace App\Domain\Entity\Currency;

interface Currency
{
    public function getCode(): string;
}