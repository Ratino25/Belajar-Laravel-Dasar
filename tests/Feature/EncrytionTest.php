<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncrytionTest extends TestCase
{
    public function testEncryption()
    {
        $encrypt = Crypt::encrypt("Ratino");
        var_dump($encrypt);

        $decrypt = Crypt::decrypt($encrypt);
        self::assertEquals("Ratino", $decrypt);
    }

}
