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

    public function testRouteParameter()
    {
        $this->get('/products/1')
            ->assertSeeText('Product 1');

        $this->get('/products/2')
            ->assertSeeText('Product 2');

        $this->get('/products/1/items/xxxx')
            ->assertSeeText('Product 1, Item xxxx');

        $this->get('/products/2/items/yyyy')
            ->assertSeeText('Product 2, Item yyyy');


    }

    public function testRouteParameterRegex()
    {
        $this->get('/categories/100')
            ->assertSeeText('Category 100');

        $this->get('/categories/ratino')
            ->assertSeeText('404 Not Found');
    }

    public function testRouteParameterOptional()
    {
        $this->get('users/ratino')->assertSeeText('User ratino');
        $this->get('/users/')->assertSeeText('User 404');
    }

    public function testRouteConflict()
    {
        $this->get('conflict/atc')->assertSeeText('Conflict atc');
        $this->get('conflict/ratino')->assertSeeText('Conflict aprlia tri cahyani');
    }

    public function testNamedRoute()
    {
        $this->get('/produk/12345')->assertSeeText('Link http://localhost/products/12345');
        $this->get('/produk-redirect/12345')->assertSeeText(' products/12345');

    }


}
