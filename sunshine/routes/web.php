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

Route::get('/admin/danhsachsanpham/print', 'SanPhamController@print')->name('danhsachsanpham.print'); //truoc
Route::get('/admin/danhsachsanpham/excel', 'SanPhamController@excel')->name('danhsachsanpham.excel');
Route::get('/admin/danhsachsanpham/pdf', 'SanPhamController@pdf')->name('danhsachsanpham.pdf');

Route::resource('/admin/danhsachsanpham', 'SanPhamController'); //sau: /danhsachsanpham/...


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::post('/admin/activate/{nv_ma}', 'Backend\BackendController@activate')->name('activate');
