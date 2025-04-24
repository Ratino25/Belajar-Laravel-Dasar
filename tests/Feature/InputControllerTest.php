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


}
