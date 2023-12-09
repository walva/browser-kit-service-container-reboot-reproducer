<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Entity\Forecast;
use App\Service\ForecastHttpClient;

class ForecastStateProvider implements ProviderInterface
{
    public function __construct(public ForecastHttpClient $client)
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {

        return new Forecast('BE', $this->client->getCurrentDegreeInCelsius('BE'));
    }
}
