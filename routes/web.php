<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ratino', function (){
    return "Hello Ratino";
});

Route::redirect('/youtube', '/ratino');

Route::fallback(function (){
    return "404 Not Found";
});

Route::view('/hello', 'hello', ['name' => 'Ratino']);

Route::get('hello-again', function(){
   return view('hello',['name' => 'Ratino']);
});

Route::get('hello-world', function(){
    return view('hello.world',['name' => 'Ratino']);
});

