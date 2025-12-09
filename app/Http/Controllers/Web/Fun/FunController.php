<?php

namespace App\Http\Controllers\Web\Fun;

use App\Http\Controllers\Controller;

class FunController extends Controller
{
    public function index()
    {
        return view('pages.fun.index');
    }
}
