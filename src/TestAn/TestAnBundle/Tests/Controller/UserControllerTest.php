<?php

namespace TestAn\TestAnBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users/add');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users');
    }

}
