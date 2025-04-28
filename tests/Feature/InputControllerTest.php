<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=ratino')
            ->assertSeeText('Hello ratino');

        $this->post('/input/hello', [
            'name' => 'ratino'
        ])->assertSeeText('Hello ratino');
    }

    public function testInputNested()
    {
        $this->post('input/hello/first',[
            "name" => [
                "first" => "Aprilia",
                "last" => "TriCahyani"
            ]
        ])->assertSeeText("Hello Aprilia");
    }

    public function testInputAll()
    {
        $this->post('input/hello/input',[
            "name" => [
                "first" => "Aprilia",
                "last" => "TriCahyani"
            ]
        ])->assertSeeText("name")->assertSeeText("first")
            ->assertSeeText("last")->assertSeeText("Aprilia")
            ->assertSeeText("TriCahyani");
    }

    public function testInputArray()
    {
        $this->post('/input/hello/array', [
            "products" => [
                [
                    "name" => "Apple mac book pro",
                    "price" => 3000000
                ],
                [
                    "name" => "Samsung galaxy s10",
                    "price" => 1500000
                ]
            ]
        ])->assertSeeText("Apple mac book pro")
            ->assertSeeText("Samsung galaxy s10");
    }

    public function testInputType()
    {
        $this->post('input/type', [
            'name' => "Ratino",
            'married' => 'true',
            'birth_date' => '1990-10-10'
        ])->assertSeeText('Ratino')->assertSeeText("true")->assertSeeText("1990-10-10");
    }

    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            'name' => [
                "first" => "Aprilia",
                "middle" => "Tri",
                "last" => "Cahyani"
            ]
        ])->assertSeeText("Aprilia")->assertSeeText("Cahyani")->assertDontSeeText("Tri");
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            "username" => "Ratino",
            "password" => "rahasia",
            "admin" => "true"

        ])->assertSeeText("Ratino")->assertSeeText("rahasia")->assertDontSeeText("admin");
    }

    public function testFilterMerge()
    {
        $this->post('/input/filter/merge', [
            "username" => "Ratino",
            "password" => "rahasia",
            "admin" => "true"

        ])->assertSeeText("Ratino")->assertSeeText("rahasia")->assertSeeText("admin")->assertSeeText("false");
    }


}
