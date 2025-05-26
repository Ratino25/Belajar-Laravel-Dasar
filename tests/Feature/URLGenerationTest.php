<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent()
    {
        $this->get('/url/current?name=Ratino')
            ->assertSeeText("/url/current?name=Ratino");
    }

    public function testNamed()
    {
        $this->get('/redirect/named')
            ->assertSeeText("/redirect/name/Ratino");
    }

    public function testAction()
    {
        $this->get('/url/action')
            ->assertSeeText("/form");
    }


}
