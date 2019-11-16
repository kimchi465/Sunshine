<?php

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

Route::get('/gioi-thieu', function () {
    return 'Hello, firtst route giới thiệu!';
});

Route::get('/lien-he', function () {
    return 'Dia chi <h1>la...</h1>';
});