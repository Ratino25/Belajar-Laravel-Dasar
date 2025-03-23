<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class configurationTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $website = config('contoh.website');

        self::assertEquals('Aprilia', $firstName);
        self::assertEquals('Tricahyani', $lastName);
        self::assertEquals('aprilia@gmail.com', $email);
        self::assertEquals('https://aprilia.com', $website);
    }


}
