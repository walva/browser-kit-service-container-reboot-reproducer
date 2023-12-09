<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Service\ForecastHttpClient;

class ForecastApiTest extends ApiTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $forecastHttpClient = $client->getContainer()->get(ForecastHttpClient::class);
        $forecastHttpClient->current = 20;
        dump('before 1');
        $response = $client->request('GET', '/api/forecasts');
        dump('after 1');
        $this->assertJsonContains(['degreeInCelsius' => '20']);


        $forecastHttpClient = $client->getContainer()->get(ForecastHttpClient::class);
        $forecastHttpClient->current = 5;
        dump("before 2");
        $response = $client->request('GET', '/api/forecasts');
        dump("after 2");

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['degreeInCelsius' => '5']);

    }
}
