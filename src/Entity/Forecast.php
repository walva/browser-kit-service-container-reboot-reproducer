<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\State\ForecastStateProvider;

#[ApiResource(
    operations: [
        new Get(provider: ForecastStateProvider::class),
    ]
)]
class Forecast
{
    public function __construct(
        public string $identifier,
        public string $degreeInCelsius
    ){}
}
