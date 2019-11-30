<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Example2Controller extends Controller
{
    public function gioithieubanthan()
    {
        return view('gioithieubanthan');
    }

    public function ngayhomnay()
    {
        return view('ngayhomnay');
    }
}
