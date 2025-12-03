<?php

namespace App\Http\Controllers\Web\Fun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index()
    {
        return view('pages.fun.meme.index');
    }
}
