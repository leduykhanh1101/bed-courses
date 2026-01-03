<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return 'About Us';
});
Route::get('/about us', function () {
    return view('aboutus');
});
Route::get('user/{name?}', function (?string $name = 'Di Canh') {
    return "Name: {$name}";
});


