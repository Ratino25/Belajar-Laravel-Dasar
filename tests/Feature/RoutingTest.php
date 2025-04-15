<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/ratino')
            ->assertStatus(200)
            ->assertSeeText('Hello Ratino');
    }

    public function testRedirect()
    {
        $this->get('/youtube')
            ->assertRedirect('/ratino');

    }

    public function testFallback()
    {
        $this->get('/tidakada')
            ->assertSeeText('404 Not Found');
    }


}
