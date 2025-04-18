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

Route::get('/products/{id}', function($productId){
    return "Product $productId";
})->name('product.detail');

Route::get('products/{product}/items/{item}', function($productId, $itemId){
   return "Product $productId, Item $itemId";
})->name('product.item.detail');

Route::get('categories/{id}', function($categoryId){
   return "Category $categoryId";
})->where('id', '[0-9]+')->name('category.detail');

Route::get('/users/{id?}', function($id = '404') {
   return "User $id";
})->name('user.detail');

Route::get('/conflict/ratino', function(){
    return "Conflict aprlia tri cahyani";
});

Route::get('/conflict/{name}', function($name){
    return "Conflict $name";
});

Route::get('/produk/{id}', function($id){
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/produk-redirect/{id}', function($id){
    return redirect()->route('product.detail', ['id' => $id]);
});



