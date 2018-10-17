<?php

namespace App\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StateControllerTest extends WebTestCase
{
    public function testState()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/State');
    }

}
