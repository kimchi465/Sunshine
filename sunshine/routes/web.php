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
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gioi-thieu', function () {
    return 'Hello, firtst route giới thiệu!';
});

Route::get('/lien-he', function () {
    return 'Dia chi <h1>la...</h1>';
});

Route::get('/test', function () {
    $data = DB::select('select * from loai');
    return $data;
});

Route::get('/hello', 'ExampleController@hello')->name('example.hello');
Route::get('/gioithieubanthan', 'Example2Controller@gioithieubanthan')->name('example2.gioithieubanthan');
Route::get('/php', 'Example3Controller@php')->name('hoctap.php');
Route::get('/laravel', 'Example3Controller@laravel')->name('hoctap.laravel');
Route::get('/ngayhomnay', 'Example2Controller@ngayhomnay')->name('ngayhomnay');