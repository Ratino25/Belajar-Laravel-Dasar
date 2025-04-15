<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText("Hello Ratino");

        $this->get('/hello-again')
            ->assertSeeText("Hello Ratino");
    }

    public function testNested()
    {
        $this->get('/hello-world')
            ->assertSeeText("World Ratino");
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'Ratino'])
            ->assertSeeText("Hello Ratino");

        $this->view('hello.world', ['name' => 'Ratino'])
            ->assertSeeText("World Ratino");
    }


}
