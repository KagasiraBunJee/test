<?php

namespace TestAn\TestAnBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GroupControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/groups/add');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/groups');
    }

}
