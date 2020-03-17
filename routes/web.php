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
    //return redirect()->route('category.show', ['slug' => 'books']);
});

Route::prefix('hello')->group(function () {
    Route::get('/', function () {
        return "Hi API 😎";
    });

    Route::get('/json', function () {
        return ['message' => "Hi API 😜"];
    });

    Route::get('/json2', function () {
        return response(['message' => 'Hi API'], 200)
            ->header('Content-Type', 'application/json');
    });

    Route::get('/hello-json3', function () {
        return response()->json(['message' => 'Hello API 😛']);
    });
});

Route::get('/category/{slug}', function ($slug) {
    return "Category Slug: $slug";
})->name('category.show');

Route::get('/product/{id}/{type?}', 'ProductController@show')->name('product.show');
