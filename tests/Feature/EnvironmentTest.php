<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Support\Env;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv(){

    }

    public function testDefaultEnv()
    {

        $author = env('AUTHOR', 'Ratino');
        self::assertEquals('Ratino', $author);
    }
}
