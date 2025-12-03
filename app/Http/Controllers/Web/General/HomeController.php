<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.general.home.index');
    }
}
