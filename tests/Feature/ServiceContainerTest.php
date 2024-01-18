<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use App\Data\Bar;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDepedency()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1,$foo2);
    }

    public function testBind(){
        // $person = $this->app->make(Person::class);
        // self::assertNotNull($person);

        $this->app->bind(Person::class, function($app){
            return new Person('Nur','Anisa');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Nur', $person1->firstName);
        self::assertEquals('Nur', $person2->firstName);
        self::assertNotSame($person1,$person2);

    }

    public function testSingleton(){
        // $person = $this->app->make(Person::class);
        // self::assertNotNull($person);

        $this->app->singleton(Person::class, function($app){
            return new Person('Nur','Anisa');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Nur', $person1->firstName);
        self::assertEquals('Nur', $person2->firstName);
        self::assertSame($person1,$person2);

    }

    public function testInstance(){
        // $person = $this->app->make(Person::class);
        // self::assertNotNull($person);

        $person = new Person('Nur','Anisa');
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Nur', $person1->firstName);
        self::assertEquals('Nur', $person2->firstName);
        self::assertSame($person1,$person2);

    }

    public function testDepedencyInjection()
    {
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($bar1, $bar2);
    }

    public function testInterfaceToClass()
    {
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
        $this->app->singleton(HelloService::class, function ($app){
            return new HelloServiceIndonesia();
        });
        $helloService = $this->app->make(HelloService::class);
        self::assertEquals('Halo Anis', $helloService->hello('Anis'));
    }
}
