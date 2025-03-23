<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testConfig()
    {
        $firstName = config('contoh.name.first');
        $lastName = config('contoh.name.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Nur', $firstName);
        self::assertEquals('Anisa', $lastName);
        self::assertEquals('nur_anisa@gmail.com', $email);
        self::assertEquals('https://www.nuranisa.com', @$web);
    }
}
