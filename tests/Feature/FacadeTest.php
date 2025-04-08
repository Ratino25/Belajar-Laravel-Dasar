<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstName1 = config('contoh.author.config');
        $firstName2 = Config::get('contoh.author.config');

        self::assertEquals($firstName1, $firstName2);
    }

    public function testConfigDepedency()
    {
        $config = $this->app->make('config');
        $firstName3 = $config->get('contoh.author.config');
        $firstName1 = config('contoh.author.config');
        $firstName2 = Config::get('contoh.author.config');

        self::assertEquals($firstName1, $firstName2);
        self::assertEquals($firstName1, $firstName3);
    }

    public function testFacadeMock()
    {
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Ratino Keren');

        $firstName = Config::get('contoh.author.first');

        self::assertEquals('Ratino Keren', $firstName);
    }


}
