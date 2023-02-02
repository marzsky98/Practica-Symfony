<?php

use PHPUnit\Framework\TestCase;
use PokePHP\PokeApi;

class ClientTest extends TestCase
{
    public function testResourceList()
    {
        $poke = new PokeApi();

        $response = $poke->resourceList('evolution-chain', '20', '20');

        //$this->Json($response, 'message');
        return json_decode($response, 'message');
    }

    public function testBerry()
    {
        $poke = new PokeApi();

        $response = $poke->berry('1');

        //$this->assertJson($response, 'message');
        return json_decode($response, 'message');
    }
}
