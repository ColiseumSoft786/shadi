<?php

namespace App\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CountryControllerTest extends WebTestCase
{
    public function testCountries()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Countries');
    }

}
