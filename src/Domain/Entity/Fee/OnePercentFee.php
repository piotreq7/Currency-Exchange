<?php

namespace App\Domain\Entity\Fee;

class OnePercentFee implements FeeInterface
{

    public function getFee(): float
    {
        return 0.01;
    }
}