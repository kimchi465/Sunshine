<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;

class ExampleController extends Controller
{
    public function hello()
    {
        $dataLoai = Loai::all();
        $hoten = '<script>alert("hello JS");</script>Nguyễn Thị Kim Chi';
        $isAdmin = false;

        return view('hello')
                ->with('isAdmin', $isAdmin)
                ->with('hotenTrongView', $hoten)
                ->with('dataLoai', $dataLoai);
    }
}
