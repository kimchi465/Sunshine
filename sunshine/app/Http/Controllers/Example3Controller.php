<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Example3Controller extends Controller
{
    public function php()
    {
        return view('hoctap.php');
    }

    public function laravel()
    {
        return view('hoctap.laravel');
    }
}
