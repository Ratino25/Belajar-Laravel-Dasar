<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {
        $fileSystem = Storage::disk('local');
        $fileSystem->put('file.txt', "Aprilia Tri Cahyani");

        $content = $fileSystem->get('file.txt');

        self::assertEquals('Aprilia Tri Cahyani', $content);
    }

    public function testPublic()
    {
        $fileSystem = Storage::disk('public ');
        $fileSystem->put('file.txt', "Aprilia Tri Cahyani");

        $content = $fileSystem->get('file.txt');

        self::assertEquals('Aprilia Tri Cahyani', $content);
    }

}
